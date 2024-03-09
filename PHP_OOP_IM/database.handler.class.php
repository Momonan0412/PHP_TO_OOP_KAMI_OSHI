<?php
    // class DatabaseHandler {
    //     protected function connect() {
    //         $user = "root";
    //         $password = "Chua123";
    //         $host = "localhost";
    //         $port = 3306;
    //         $dbname = "dbchuaf3";
    
    //         $mysqli = new mysqli($host, $user, $password, $dbname, $port);
    
    //         // Check connection
    //         if ($mysqli->connect_error) {
    //             die("Connection failed: " . $mysqli->connect_error);
    //         }
    
    //         return $mysqli;
    //     }
    // }
    // PDO
    class DatabaseHandler{
        protected function connect(){
            try {
                $user = "root";
                $password = "Chua123";
                $host = "localhost";
                $port = 3306;
                $dbname = "dbchuaf3";
                $database = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
                return $database;
            } catch (PDOException $e) {
                // Print or echo the error message
                echo "Connection failed: " . $e->getMessage();
                die();
            }
        }
    }
?>