<?php

    $db_server = 'localhost';
    $db_user = 'root';
    $db_pass = '22092209';
    $db_name = 'portfolioready';
    $conn = '';

        try{
            $conn = mysqli_connect($db_server,$db_user,$db_pass, $db_name);
        }catch(mysqli_sql_exception){
            echo"Could not connect to the database";
        }
   
?>


<!-- SN, First_Name, Last_Name, Phone, Email, Avatar, Pass, Reg_Date -->