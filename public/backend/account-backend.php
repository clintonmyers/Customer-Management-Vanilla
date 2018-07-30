<?php

session_start();

if( empty($_SESSION['username']) ){
    header("Location: /");
}


include 'database.php';
$username = $_SESSION['username'];
$query = "SELECT customers FROM users WHERE username='$username'";
$result = mysqli_query($connection, $query);
$customers = "empty customer list";
$output = "";

if($connection && $result) {

    $customers = mysqli_fetch_array($result)[0];
    $customers = json_decode($customers);

}

else if (!$connection) {
    $output = die("Database connection failed");
}

else {
    $output = die('Query FAILED ' . mysqli_error($connection));
}

if(isset($_POST['add-customer'])) {
    $new = $_POST['new-customer'];
    $new = mysqli_real_escape_string($connection, $new);
    array_push($customers, $new);
    $customers = json_encode($customers);
    $query = "UPDATE users SET customers='$customers' WHERE username='$username'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: /account.php");
    }
    
    else {
        $output .= "<br>Error: " . mysqli_error($connection);
    }
}

if(isset($_POST['remove'])){
    unset($customers[intval($_POST['index'])]);
    $customers = array_values($customers);
    $customers = json_encode($customers);
    $query = "UPDATE users SET customers='$customers' WHERE username='$username'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: /account.php");
    }
    
    else {
        $output .= "<br>Error: " . mysqli_error($connection);
    }
}