<?php

class AuthModel extends Database {

    public function login($email, $password) {
        $email = $this->escape($email);
        $user = $this->query("SELECT * FROM users NATURAL JOIN is_in NATURAL JOIN promotion NATURAL JOIN center WHERE email = ?", [$email])->fetch();
        if ($user) {
            if (password_verify($password, $user->password)) {
                Session::getInstance()->write('user', $user);
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

    public function logout() {
        Session::getInstance()->destroy();
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
