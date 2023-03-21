<?php

class Session {

    static $session;

    public function __construct() {
        session_set_cookie_params(0, '/', 'localhost', true, true);
        session_start();
    }

    public function getInstance() {
        if (self::$session === null) {
            self::$session = new Session();
        }
        return self::$session;
    }

    public function write($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function read($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function destroy($key) {
        unset($_SESSION[$key]);
     }
}
