<?php
class db{
    public function connect(){
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myngheviet";

        $conn = mysqli_connect($hostname, $username, $password, $dbname);
        if (!$conn) {
            echo "Database connection error" . mysqli_connect_error();
            exit();
        } else {
            mysqli_select_db($conn, $dbname);
            mysqli_set_charset($conn, 'UTF8');
            return $conn;
        }
    }
}

?>