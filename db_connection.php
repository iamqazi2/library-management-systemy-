<?php
function get_db_connection() {
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "LMS";

    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        
        return $conn;
    } catch (Exception $e) {
        // Log error (in production, you might want to log to a file instead)
        error_log($e->getMessage());
        throw new Exception("Database connection error");
    }
}
?>