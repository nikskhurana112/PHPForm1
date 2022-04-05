<?php
session_start();
require_once 'db.php';

if(isset($_SESSION['username']) == true){
    header('Location:welcome.php');
    exit;
}

$p_username = $_POST['email'];
$p_password = $_POST['password'];

$err = [];

if (empty($p_username)) {
    $err[] = "Email is required";
  } else {
    $p_username = test_input($p_username);
    if (!filter_var($p_username, FILTER_VALIDATE_EMAIL)) {
      $err[] = "Invalid Email format";
    }
  }
  
  if (empty($p_password)) {
    $err[] = "Password is required";
  } else {
    if (strlen($p_password) > 15 || strlen($p_password) < 5) {
      $err[] = "Password must be between 5 and 15 characters";
    }
  }

    function test_input($data)
    {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }


if (!empty($err)) {
    $_SESSION['message'] = $err;
    header("Location:login.php");
}

$result = $db->prepare("SELECT * FROM signUps WHERE email = ?");
$result->execute([$p_username]);
$user = $result->fetch();


if($user && password_verify($p_password, $user['password'])){
    
    $_SESSION['username'] = $user['email'];
    $_SESSION['first_name'] = $user['first_name'];
    header("Location:welcome.php");
    exit;
}

    else{
        header("Location:login.php");
        exit;
    }
