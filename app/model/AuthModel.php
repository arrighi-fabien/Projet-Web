<?php

class AuthModel extends Database {

    public function isLogged() {
        return Session::getInstance()->read('user');
    }

    public function login($email, $password, $remember = false) {
        $email = $this->escape($email);
        $user = $this->query("SELECT * FROM users NATURAL JOIN is_in NATURAL JOIN promotion NATURAL JOIN center WHERE email = ?", [$email])->fetch();
        if ($user) {
            if (password_verify($password, $user->password)) {
                Session::getInstance()->write('user', $user);
                if ($remember) {
                    $remember_token = AppModel::random(250);
                    if ($this->query("SELECT * FROM remember WHERE id_user = ?", [$user->id_user])->fetch()) {
                        $this->query("UPDATE remember SET remember_token = ? WHERE id_user = ?", [$remember_token, $user->id_user]);
                    }
                    else {
                        $this->query("INSERT INTO remember (id_user, remember_token) VALUES (?, ?)", [$user->id_user, $remember_token]);
                    }
                    setcookie('remember', $user->id_user.'='.$remember_token, time() + 60 * 60 * 24 * 7, '', '', false, false);
                }
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function reconnectFromCookie() {
        if (isset($_COOKIE['remember']) && !Session::getInstance()->read('user')) {
            $remember_token = explode('=', $_COOKIE['remember']);
            $user = $this->query("SELECT * FROM users NATURAL JOIN is_in NATURAL JOIN promotion NATURAL JOIN center NATURAL JOIN remember WHERE id_user = ?", [$remember_token[0]])->fetch();
            if ($user) {
                if ($remember_token[1] === $user->remember_token) {
                    Session::getInstance()->write('user', $user);
                    setcookie('remember', $user->id_user.'='.$user->remember_token, time() + 60 * 60 * 24 * 7, '/login', '', false, false);
                    return true;
                }
                else {
                    setcookie('remember', null, -1, '/login', '', false, false);
                    return false;
                }
            }
            else {
                setcookie('remember', null, -1, '/login', '', false, false);
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function logout() {
        setcookie('remember', '', time() - 3600, '/login', '', false, false);
        Session::getInstance()->destroy('user');
        header("Location: /");
        exit();
    }

    /*
    * Admin = 3
    * Pilot = 2
    * User = 1
    */
    public function getUserNumberPrivilege($id_user) : int {
        $user = $this->query("SELECT * FROM users WHERE id_user = ?", [$id_user])->fetch();
        if($user->is_admin == true){
            return 3;
        } else if($user->is_pilot == true){
            return 2;
        } else {
            return 1;
        }   
    }


    /*
    * Return true if user is admin
    *
    * @param int $id_user
    * 
    * @return bool
    */
    public function userIsAdmin($id_user) : bool {
        if(getUserNumberPrivilege($id_user) == 3){
            return true;
        } else {
            return false;
        }
    }

    /*
    * Return true if user is pilot
    *
    * @param int $id_user
    *
    * @return bool
    */

    public function userIsPilot($id_user) : bool {
        if(getUserNumberPrivilege($id_user) == 2){
            return true;
        } else {
            return false;
        }
    }

    /*
    * Return true if user is student
    *
    * @param int $id_user
    *
    * @return bool
    */
    public function userIsStudent($id_user) : bool {
        if(getUserNumberPrivilege($id_user) == 1){
            return true;
        } else {
            return false;
        }
    }


    public function getWishlistId() {
        $user = Session::getInstance()->read('user');
        $wishlist = $this->query("SELECT id_internship FROM wishlist WHERE id_user = ?", [$user->id_user])->fetchAll();
        $wishlist_id = [];
        foreach ($wishlist as $internship) {
            $wishlist_id[] = $internship->id_internship;
        }
        $user->wishlist_id = $wishlist_id;
        Session::getInstance()->write('user', $user);
    }

    public function getWishlist() {
        $user = Session::getInstance()->read('user');
        $wishlist = $this->query("SELECT * FROM wishlist NATURAL JOIN internship NATURAL JOIN company NATURAL JOIN city WHERE id_user = ?", [$user->id_user]);
        return AppModel::getEllapsedTime($wishlist->fetchAll(), 'offer_date');
    }

    public function getRate() {
        $user = Session::getInstance()->read('user');
        $rate = $this->query("SELECT * FROM rate WHERE id_user = ?", [$user->id_user]);
        return $rate;
    }

    public function addRate($id_company, $id_user, $rate) {
        $this->query("DELETE FROM rate WHERE id_company = ? AND id_user = ?", [$id_company, $id_user]);
        $this->query("INSERT INTO rate (id_company, id_user, evaluation) VALUES (?, ?, ?)", [$id_company, $id_user, $rate]);
    }

    public function addTrust($id_company, $id_user) {
        $this->query("INSERT INTO trust (id_company, id_user) VALUES (?, ?)", [$id_company, $id_user]);
    }

    public function removeTrust($id_company, $id_user) {
        $this->query("DELETE FROM trust WHERE id_company = ? AND id_user = ?", [$id_company, $id_user]);
    }

    public function getCandidatures() {
        $user = Session::getInstance()->read('user');
        $candidatures = $this->query("SELECT * FROM candidate NATURAL JOIN internship NATURAL JOIN company NATURAL JOIN city WHERE id_user = ?", [$user->id_user]);
        return AppModel::getEllapsedTime($candidatures->fetchAll(), 'offer_date');
    }

    public function addWishlist($id_offer) {
        $user = Session::getInstance()->read('user');
        $this->query("INSERT INTO wishlist (id_user, id_internship) VALUES (?, ?)", [$user->id_user, $id_offer]);
        // add id to session
        $user->wishlist_id[] += $id_offer;
    }

    public function removeWishlist($id_offer) {
        $user = Session::getInstance()->read('user');
        $this->query("DELETE FROM wishlist WHERE id_user = ? AND id_internship = ?", [$user->id_user, $id_offer]);
        // remove id from session
        $key = array_search($id_offer, $user->wishlist_id);
        unset($user->wishlist_id[$key]);
    }

    public function searchUsers($limit, $page, $last_name = null, $first_name = null, $promotion = null, $center = null, $is_admin = null, $is_pilot = null) {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT id_user, first_name, last_name, email, is_admin, is_pilot, GROUP_CONCAT(DISTINCT promotion_name ORDER BY promotion_name SEPARATOR ', ') AS promotion_name, center_name FROM users NATURAL JOIN is_in NATURAL JOIN promotion NATURAL JOIN center WHERE 1";
        $tab = [];
        if ($last_name) {
            $sql .= " AND last_name LIKE ?";
            array_push($tab, "%$last_name%");
        }
        if ($first_name) {
            $sql .= " AND first_name LIKE ?";
            array_push($tab, "%$first_name%");
        }
        if ($promotion) {
            $sql .= " AND promotion_name = ?";
            array_push($tab, $promotion);
        }
        if ($center) {
            $sql .= " AND center_name = ?";
            array_push($tab, $center);
        }
        if ($is_admin) {
            $sql .= " AND is_admin = ?";
            array_push($tab, $is_admin);
        }
        if ($is_pilot) {
            $sql .= " AND is_pilot = ?";
            array_push($tab, $is_pilot);
        }
        $sql .= " GROUP BY users.id_user ORDER BY last_name ASC";
        $sql .= " LIMIT $limit OFFSET $offset";
        return $this->query($sql, $tab)->fetchAll();
    }

    public function escape($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    public function getCenters() {
        return $this->query("SELECT * FROM center")->fetchAll();
    }

    public function getPromotions() {
        return $this->query("SELECT * FROM promotion")->fetchAll();
    }

    public function addUser($first_name, $last_name, $email, $password, $is_admin, $is_pilot, $center, $promotion) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $this->query("INSERT INTO users (last_name, first_name, email, password, is_admin, is_pilot, id_center) VALUES (?, ?, ?, ?, ?, ?, ?)", [$last_name, $first_name, $email, $password, $is_admin, $is_pilot, $center]);
        $id_user = $this->query("SELECT id_user FROM users WHERE email = ?", [$email])->fetch()->id_user;
        $this->query("INSERT INTO is_in (id_user, id_promotion) VALUES (?, ?)", [$id_user, $promotion]);
    }

    public function deleteUser($id_user) {
        $this->query("DELETE FROM users WHERE id_user = ?", [$id_user]);
    }

    public function updateUser($id_user, $first_name, $last_name, $email, $password, $is_admin, $is_pilot, $center, $promotion) {
        if ($password) {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $this->query("UPDATE users SET password = ? WHERE id_user = ?", [$password, $id_user]);
        }
        $this->query("UPDATE users SET last_name = ?, first_name = ?, email = ?, is_admin = ?, is_pilot = ?, id_center = ? WHERE id_user = ?", [$last_name, $first_name, $email, $is_admin, $is_pilot, $center, $id_user]);
        $this->query("UPDATE is_in SET id_promotion = ? WHERE id_user = ?", [$promotion, $id_user]);
    }

    public function getUserDetails($id_user) {
        return $this->query("SELECT * FROM users NATURAL JOIN is_in NATURAL JOIN promotion NATURAL JOIN center WHERE id_user = ?", [$id_user])->fetch();
    }

    public function addCandidate($id_offer, $id_user) {
        $this->query("INSERT INTO candidate (id_internship, id_user) VALUES (?, ?)", [$id_offer, $id_user]);
    }
}
