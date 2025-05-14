<?php
session_start();
if (!isset($_SESSION['is_logged_in'])) { // This is to check whether the user is logged in, if they will be redirected to the login page
  $_SESSION['error'] = "Error: Unauthorised access. Please login.";
  header("Location: signin.php");
  exit;
}

require_once('include/header.php');
?>

<!-- This the Change Password page -->
<section class="vh-100 bg-primary">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-3-strong" style="border-radius: 1rem">
          <form class="card-body p-5 text-center" action="dopassword.php" method="POST">
            <p class="fw-bold fs-2">Change Password</p>

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

            if (isset($_SESSION['success'])) {
            ?>
              <div class="mb-3">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <div>
                    <?php echo $_SESSION['success']; ?>
                  </div>
                </div>
              </div>
            <?php
              unset($_SESSION['success']);
            }
            ?>

            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label fw-bold">Old Password</label>
              <input name="oldpassword" type="password" class="form-control" id="formGroupExampleInput" placeholder="Old Password" />
            </div>

            <div class="mb-3">
              <label for="formGroupExampleInput2" class="form-label fw-bold">New Password</label>
              <input name="newpassword" type="password" class="form-control" id="formGroupExampleInput2" placeholder="New Password" />
              <div id="passwordHelpBlock" class="form-text">Your password must be 8-15 characters long</div>
            </div>

            <div class="mb-3">
              <label for="formGroupExampleInput2" class="form-label fw-bold">Confirm New Password</label>
              <input name="conpassword" type="password" class="form-control" id="formGroupExampleInput2" placeholder=" Confirm New Password" />
              <div id="passwordHelpBlock" class="form-text">Your password must be 8-15 characters long</div>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
              <input class="btn btn-primary" type="submit" value="submit" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
require_once('include/footer.php');
?>