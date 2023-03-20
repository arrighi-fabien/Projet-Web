<?php

class UserModel extends Database {

    public function getWishlistElementId($user_id) {
        $result = $this->query("SELECT id_internship FROM wishlist WHERE id_user = $user_id");
        return $result->fetchAll();
    }
}
