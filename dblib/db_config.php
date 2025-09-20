<?php

if (!class_exists('DatabaseConnection')) {
    class DatabaseConnection {
        private static $instance = null;
        private $connection;

        // Database credentials
        private $host = "localhost";
        private $user = "root";
        private $pass = "";
        private $dbname = "test";

        // Private constructor to prevent multiple instances
        private function __construct() {
            $this->connection = new mysqli(
                $this->host,
                $this->user,
                $this->pass,
                $this->dbname
            );

            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
        }

        // Get the instance of the class
        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new DatabaseConnection();
            }
            return self::$instance;
        }

        // Get the mysqli connection object
        public function getConnection() {
            return $this->connection;
        }
    }
}
?>
