<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Register User</title>
</head>

<body>

  <div class="container pt-5">
    <h1 class="text-primary">Register User</h1>

    <?php



    if (!empty($_SESSION['message'])) :
    ?>
      <?php foreach ($_SESSION['message'] as $message) : ?>
        <div class="alert alert-danger"><?php echo $message; ?><br></div>
      <?php endforeach; ?>
    <?php
      unset($_SESSION['message']);
    endif; ?>


    <form action="doregister.php" method="post">

      <div class="row pt-3">


        <div class="col-md-12 ">
          <label class="text-secondary" for="">First Name: </label>
          <input type="text" class="form-control" required placeholder="Enter your First Name" name="first_name" />
        </div>

        <div class="col-md-12 pt-2">
          <label class="text-secondary" for="">Last Name: </label>
          <input type="text" class="form-control" required placeholder="Enter Your Last Name" name="last_name" />
        </div>

        <div class="col-md-12 pt-2">
          <label class="text-secondary" for="">Email: </label>
          <input type="text" class="form-control" required placeholder="Enter Your Email" name="email" />
        </div>

        <div class="col-md-12 pt-2">
          <label class="text-secondary" for="">Password:</label>
          <input type="password" class="form-control" required placeholder="Enter Your Password" name="password" />
        </div>

        <div class="col-md-12 pt-2">
          <label class="text-secondary" for="">Confirm Password:</label>
          <input type="password" class="form-control" required placeholder="Enter Password Again" name="password_confirmation" />
        </div>

        <div class="col-md-12 pt-3">
          <button class="btn btn-primary">Register</button>
        </div>
        <div class="mt-2">Already registered? <a href="login.php">Login Instead</a></div>
      </div>
    </form>
  </div>
</body>

</html>