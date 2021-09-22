<?php
            $conn = new mysqli($hostname='localhost',$username="root",$password="",$dbname="client");
            if($conn-> connect_error){
                echo 'connection failed  :  '.$conn->connect_error;
            }
?>