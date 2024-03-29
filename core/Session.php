<?php

class Session {

    static $session;

    public function __construct() {
        session_set_cookie_params(0, '/', '', false, false);
        session_start();
    }

    static function getInstance() {
        if (self::$session === null) {
            self::$session = new Session();
        }
        return self::$session;
    }

    static function write($key, $value) {
        $_SESSION[$key] = $value;
    }

    static function read($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    static function destroy($key) {
        unset($_SESSION[$key]);
     }
}
