<?php

abstract class Database {

    protected $pdo;

    public function __construct($database_name = 'projet', $host = 'localhost', $login = 'root', $password = '') {
        // time out de 1 seconde
        ini_set('default_socket_timeout', 1);
        try {
            $this->pdo = new PDO("mysql:dbname=$database_name;host=$host;port=3306", $login, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch(Exception $e){
            echo 'Erreur : '.$e->getMessage().'<br>';
            http_response_code(500);
            header('Location: /error-database-connection');
            die();
        }
    }

    public function query($query, $params = null) {
        if ($params) {
            try {
                $result = $this->pdo->prepare($query);
                $result->execute($params);
            } catch (Exception $e) {
                echo 'Erreur : '.$e->getMessage().'<br>';
            }
        } else {
            try {
                $result = $this->pdo->query($query);
            } catch (Exception $e) {
                echo 'Erreur : '.$e->getMessage().'<br>';
            }
        }
        return $result;
    }
}
