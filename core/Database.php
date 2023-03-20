<?php

abstract class Database {

    static $pdo;

    public function __construct($database_name = 'projet', $host = 'localhost', $login = 'root', $password = '') {
        // time out de 1 seconde
        ini_set('default_socket_timeout', 1);
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO("mysql:dbname=$database_name;host=$host;port=3306", $login, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch(Exception $e){
                echo 'Erreur : '.$e->getMessage().'<br>';
                http_response_code(500);
                header('Location: /error-database-connection');
                die();
            }
        }
        else {
            self::$pdo = self::$pdo;
        }
    }

    public function query($query, $params = null) {
        if ($params) {
            try {
                $result = self::$pdo->prepare($query);
                $result->execute($params);
            } catch (Exception $e) {
                echo 'Erreur : '.$e->getMessage().'<br>';
            }
        } else {
            try {
                $result = self::$pdo->query($query);
            } catch (Exception $e) {
                echo 'Erreur : '.$e->getMessage().'<br>';
            }
        }
        return $result;
    }
}
