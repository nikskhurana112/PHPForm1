<?php
session_start();
if( isset($_SESSION['username']) == false)
{
    header("Location:login.php");
    exit;
}
?>

<h1>Welcome <?=$_SESSION['first_name']?></h1>

<form action="dologout.php">
  <button class="btn btn-danger">Log Out</button>
</form>
