<?php

session_start();

if( isset($_SESSION['username']) ){
	header("Location: /account.php");
}

if(isset($_POST['submit-login'])) {

    include 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];    
	$query = "SELECT * FROM users";
	$result = mysqli_query($connection, $query);
    $userexists = false;
    $match = false;
    $output = "";

    //sanitize input to prevent injections
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    //hash password
    $hashFormat = "$2y$10$";
    $salt = "3498ksdf7740jkdf8bfw2m";
    $hashF_and_salt = $hashFormat . $salt;
    if ($password != "") $password = crypt($password,$hashF_and_salt);

    if($connection && $username && $password && $result) {
    
        $output = "";

        while($row = mysqli_fetch_assoc($result)) {

            if($username === $row['username']) {
                $output .= "Welcome back $username";
                $userexists = true;
            }

            if($username === $row['username'] && $password === $row['password']) {
                $output .= "<br>Username and password are correct!";
                $match = true;
                $_SESSION['username'] = $username;
                header("Location: /account.php");
                break;
            }
        }

        if (!$userexists) {
            $output .= "<br>Username not found";
        }
        
        if (!$match && $userexists) {
            $output .= "<br>Password is incorrect";
        }

    }
    
    if(!$username) {
        $output .= "<br>No username entered";
    }
    
    if(!$password) {
        $output .= "<br>No password entered";
    }
    
    if (!$connection) {
        $output = die("Database connection failed");
    }
    
    else {
        $output = die('Query FAILED' . mysqli_error());
    }
}