<?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myngheviet";
        $conn = mysqli_connect($hostname, $username, $password, $dbname);
        if (mysqli_connect_errno()) {
            echo "error" . mysqli_connect_errno();exit;
        } 

?>