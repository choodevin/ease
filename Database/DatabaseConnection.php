<?php

class DatabaseConnection {

    private static $instance = null;
    private $db;

    private function __construct() {
        $host = 'localhost';
        $dbname = 'fyp';
        $dbuser = 'root';
        $dbpassword = '';
        $dsn = "mysql:host=$host;dbname=$dbname";

        try {
            $this->db = new PDO($dsn, $dbuser, $dbpassword);
        } catch (PDOException $ex) {
            $ex->getMessage();
            exit;
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getDb() {
        return $this->db;
    }

    public static function closeConnection(&$db) {
        $db = null;
    }

}
