<?php

class PDOhelper {
    public static function createDb(array $init) {
        extract($init);
        try {
            return new PDO('mysql:host='. $host .';dbname='.$dbname, $user, $pass,
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}


