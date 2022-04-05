<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Login User</title>
</head>
<body>
  <div class="container pt-5">
    <h1 class="text-primary">Login User</h1>
    
    <?php if(!empty($_SESSION['message'])): ?>
    <?php foreach($_SESSION['message'] as $message) : ?>
      <div class="alert alert-danger">
        <?= $message; ?>
      </div>
      <?php endforeach; ?>
    <?php 
      unset($_SESSION['message']);
     endif; ?>


    <form action="dologin.php" method="post">
    <div class="row pt-3">
      <div class="form-group">
      <div class="col-md-12 ">
        <label class="text-secondary"for="">Email Id: </label>
        <input type="text" class="form-control" value="<?php $email ?>"required placeholder="Enter Email Id" name="email"/>
      </div>
      </div>
      <div class="form-group">
      <div class="col-md-12 pt-2">
        <label class="text-secondary" for="">Password: </label>
        <input type="password" class="form-control" required placeholder="Enter Password" name="password"/>
      </div>
      </div>
      <div class="form-group">
      <div class="col-md-12 pt-3">
          <button class="btn btn-primary form-control">Login</button>
      </div>
      </div>
    </div>
    <div class="mt-2">Not Registered? <a href="register.php">Register Now</a></div>
    </form>
  </div>
</body>
</html>