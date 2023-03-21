<?php

class UserModel extends Database {

    public function getWishlistElementId($user_id) {
        $result = $this->query("SELECT id_internship FROM wishlist WHERE id_user = $user_id");
        return $result->fetchAll();
    }

    public function login($email, $password) {
        $email = $this->escape($email);
        $user = $this->query("SELECT * FROM users WHERE email = ?", [$email])->fetch();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                header("Location: /dashboard");
            }
        }
    }

    public function escape($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}
