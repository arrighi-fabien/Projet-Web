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
                    setcookie('remember', $user->id_user.'='.$remember_token, time() + 60 * 60 * 24 * 7, '', '', true, true);
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
                    setcookie('remember', $user->id_user.'='.$user->remember_token, time() + 60 * 60 * 24 * 7, '/login', '', true, true);
                    return true;
                }
                else {
                    setcookie('remember', null, -1, '/login', '', true, true);
                    return false;
                }
            }
            else {
                setcookie('remember', null, -1, '/login', '', true, true);
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function logout() {
        setcookie('remember', '', time() - 3600, '/login', '', true, true);
        Session::getInstance()->destroy('user');
        header("Location: /");
        exit();
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
}
