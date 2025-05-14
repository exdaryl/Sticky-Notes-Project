<?php
session_start();
require_once('include/header.php');
?>
<!-- This is the Forget Password Page -->
<form method="POST" action="doforgetpass.php" class="bg-primary vh-100 mt-5">
  <div class="container py-5 h-75">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Find Your Account</h3>
            <?php
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
            <div class="form-outline mb-4">
              <label for="email" class="form-label">Email address</label>
              <input type="email" id="email" class="form-control form-control-md" placeholder="example@email.com" name="email" />
            </div>

            <button class="btn btn-primary btn-md btn-block" type="submit">Proceed</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>