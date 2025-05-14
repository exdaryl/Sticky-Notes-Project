<?php
session_start();
include "database.php";
if (isset($_SESSION['is_logged_in'])) {
  header('Location: dashboard.php');
  exit;
}
include_once('include/header.php');

if (isset($_POST["email"])) {

  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);

  $mysqli = open_database();
  $user = get_user($mysqli, $email, $password);
  if ($user) {

    $_SESSION['user_id'] = $user[0]['id'];
    $_SESSION['is_logged_in'] = true;
    $_SESSION['first_name'] = $user[0]['first_name'];
    header('Location: dashboard.php');
    exit;
  } else {
    $_SESSION['error'] = 'Error: Invalid email/password.';
  }
}
?>
<!-- This is the Sign In page -->
<form method="POST" action="signin.php" class="bg-primary vh-100 mt-5">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>
            <?php
            if (isset($_SESSION['error'])) { // This show an error to the user
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

            <div class="form-outline mb-4">
              <label for="email" class="form-label">Email address</label>
              <input type="email" id="email" class="form-control form-control-md" placeholder="example@email.com" name="email" />
            </div>

            <div class="form-outline mb-2">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control form-control-md" placeholder="Enter your password" />
            </div>

            <div class="form-outline mb-3">
              <input type="submit" class="btn btn-primary btn-sm mt-1" name="btnSubmit" value="Login" />
            </div>

            <div class="form-check justify-content-start mb-4">
              <label class="form-check-label" for="form1Example3"><a href="forgotpass.php">Forget Password?</a></label>
            </div>

            <div class="divider align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 text-muted justify-content-center">OR</p>
            </div>

            <button class="btn btn-primary btn-sm btn-block" type="submit"><a class="text-decoration-none text-reset" href="signup.php">Create Account</a></button>
            <hr class="my-4">
          </div>
        </div>
      </div>
    </div>
  </div>
</form>