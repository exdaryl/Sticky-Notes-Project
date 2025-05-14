<?php
session_start();
require_once('database.php');

if (isset($_POST['signUp'])) {
  $db = open_database();

  $firstName        = $_POST['first_name'];
  $lastName         = $_POST['last_name'];
  $email            = $_POST['email'];
  $password         = $_POST['password'];
  $confirmPassword  = $_POST['confirmPassword'];

  if ($password !== $confirmPassword) { // This is to check if the password matches.
    $_SESSION['error'] = "Password did not match!";
    header('Location: signup.php');
    exit;
  }
}

include_once('include/header.php');
?>
<!-- This is the Sign Up Page -->
<form method="POST" action="dosignup.php" class="bg-primary vh-100 mt-5">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Signup Now</h3>

            <?php
            if (isset($_SESSION['error'])) {
            ?>
              <div class="mb-3">
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <div>
                    <?php echo $_SESSION['error']; ?>
                  </div>
                </div>
              </div>
            <?php
              unset($_SESSION['error']);
            }
            ?>

            <div class="input-group mb-3">
              <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
              <input type="text" class="form-control" name="first_name" placeholder="First Name" />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
              <input type="text" class="form-control" name="last_name" placeholder="Last name" />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
              <input type="email" class="form-control" name="email" placeholder="Email" />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
              <input type="password" name="password" placeholder="Password" class="form-control" />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
              <input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control" />
            </div>
            <div class="d-grid">
              <input type="submit" class="btn btn-primary" name="signUp"></input>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>