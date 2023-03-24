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
        $wishlist = $this->query("SELECT * FROM wishlist NATURAL JOIN internship NATURAL JOIN company NATURAL JOIN city WHERE id_user = ?", [$user->id_user])->fetchAll();
        return $wishlist;
    }

    public function getCandidatures() {
        $user = Session::getInstance()->read('user');
        $candidatures = $this->query("SELECT * FROM candidate NATURAL JOIN internship NATURAL JOIN company NATURAL JOIN city WHERE id_user = ?", [$user->id_user])->fetchAll();
        return $candidatures;
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

    public function escape($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}
