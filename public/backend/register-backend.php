<?php

session_start();

if( isset($_SESSION['username']) ){
	header("Location: /account.php");
}

if(isset($_POST['submit-register'])) {

	include 'database.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	$query = "SELECT * FROM users";
	$result = mysqli_query($connection, $query);
	$userexists = false;
	$output = "";

	//sanitize input to prevent injections
	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);
	$confirm = mysqli_real_escape_string($connection, $confirm);

	//hash password
	$hashFormat = "$2y$10$";
	$salt = "3498ksdf7740jkdf8bfw2m";
	$hashF_and_salt = $hashFormat . $salt;

	if ($password) $password = crypt($password,$hashF_and_salt);
	if ($confirm) $confirm = crypt($confirm,$hashF_and_salt);

	if($connection && $username && $password && $confirm && $password === $confirm && $result) {

		while($row = mysqli_fetch_assoc($result)) {

			if($username === $row['username']) {
				$output .= "<br>That username already exists";
				$userexists = true;
				break;
			}
		}

		if(!$userexists) {

			$query = "INSERT INTO users (username,password,customers) VALUES ('$username','$password','[]')";
			$result = mysqli_query($connection, $query);

			if ($result) {
				$output .= "<br>New record created successfully";
			}
			
			else {
				$output .= "<br>Error: " . mysqli_error($connection);
			}
		}
	}

	else if(!$username) {
		$output .= "<br>No username entered";
	}

	else if(!$password || !$confirm) {
		$output .= "<br>Password missing";
	}

	else if ($password != $confirm) {
		$output .= "<br>Passwords do not match each other";
	}

	else if (!$connection) {
		$output = die('Query FAILED' . mysqli_error($connection));
	}

	else {
		$output .= "<br>Unexpected Error";
	}
}