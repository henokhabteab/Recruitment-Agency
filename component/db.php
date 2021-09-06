<?php
require_once('connnectionvars.php');
function Createdb(){
    $servername= $GLOBALS['servername'];
    $username=$GLOBALS['username'];
    $password=$GLOBALS['password'];
    $dbname=$GLOBALS['dbname'];
    //Create connection
    $con= mysqli_connect($servername,$username,$password,$dbname);

    //Check Connection
    if(!$con){
        die("Connection Failed:" . mysqli_connect_error());
    }

    //Create Database
    $sql= "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con,$sql)){
        

        $sql="
                CREATE TABLE IF NOT EXISTS employee(
                    employeeid INT(11) NOT  NULL AUTO_INCREMENT PRIMARY KEY,
                    fName VARCHAR(25) NOT NULL,
                    lName VARCHAR(25) NOT NULL,
                    gender VARCHAR(25) NOT NULL,
                    profession VARCHAR(25) NOT NULL,
                    address VARCHAR(25) NOT NULL,
                    email VARCHAR(25) NOT NULL,
                    password VARCHAR(25) NOT NULL,
                    phone VARCHAR(25) NOT NULL
                    );
                ";

        if(mysqli_query($con,$sql)){
            return $con;
        }else{
            echo "Cannot Create Table";
        }

    }else{
        echo "Error while creating database". mysqli_error($con);
    }
}

?>
