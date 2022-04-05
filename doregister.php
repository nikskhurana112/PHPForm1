<?php session_start();
require_once 'db.php';

if(isset($_SESSION['username']) == true){
  header('Location:welcome.php');
  exit;
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$err = [];

if (empty($first_name)) {
  $err[] = "First Name is required";
} else {
  $name = test_input($first_name);
  if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
    $err[] = "Only letters and white space allowed";
  }
}
if (empty($last_name)) {
  $err[] = "Last name is required";
} else {
  $name = test_input($last_name);
  if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
    $err[] = "Only letters and white space allowed";
  }
}

if (empty($email)) {
  $err[] = "Email is required";
} else {
  $email = test_input($email);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err[] = "Invalid Email format";
  }
}

if (empty($password)) {
  $err[] = "Password is required";
} else {
  if (strlen($password) > 15 || strlen($password) < 5) {
    $err[] = "Password must be between 5 and 15 characters";
  }
}

if ($password != $_POST['password_confirmation']) {
  $err[] = "The two password fields do not match";
}

$check = $db->prepare("SELECT * FROM signUps WHERE email = ?");
$check->execute([$email]);
$user = $check->fetch();

if ($user) {
  $err[] = "User already exists.";
  $_SESSION['message'] = $err;
  header('Location:register.php');
  exit;
}

if (!empty($err)) {

  $_SESSION['message'] = $err;
  header("location: register.php");
  exit;
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$hash = password_hash($password,  PASSWORD_BCRYPT);

$result = $db->prepare("INSERT INTO signUps (first_name, last_name, email, password) VALUES (:first_name, ?, ?, ?)");
$result->execute([":first_name" => $first_name, $last_name, $email, $hash]);

if (! $result == null) {
  $msg = [];
  $msg[] = "Registration Successful! Please login now";
  $_SESSION['message'] =  $msg;
  header('Location:register.php');
}
else{
  header("Location:register.php");
  exit;
}