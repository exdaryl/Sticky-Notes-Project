<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="styles/style.css" />
  <title>Sticky Notes</title>
  <?php if (isset($_SESSION['is_logged_in'])) { ?> <!-- This is to show the Navbar if the user is logged in -->
    <script defer src="script.js"></script>
</head>

<body>
  <!-- This is the Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark fixed-top mb-5">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold text-primary" href="dashboard.php"><img src="images/notess.png" alt="Logo" width="30" height="30" class="hide-bg d-inline-block align-text-top">Sticky Notes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary fw-semibold text-light" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary fw-semibold text-light" href="allnotes.php">All Notes</a>
          </li>
        </ul>
        <div class="col-auto">
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-person-circle fs-6"></i></button>
        </div>
      </div>
    </div>
  </nav>

  <!-- This is for the modal when clicking the profile button on the top right of the browser -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header bg-dark text-light">
      <h5 class="offcanvas-title" id="offcanvasRightLabel">Your Profile</h5>
      <button type="button" class="btn-close bg-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="text-center">
      <p class="mt-3 mb-0 fs-4 fw-medium">Hello, <?php echo $_SESSION['first_name']; ?></p> <!-- This will show the current user by using PHP -->
    </div>
    <hr>
    <div class="offcanvas-body">
      <ul class="list-unstyled">
        <li class="row">
          <div class="col">
            <button type="button" class="btn btn-primary w-100 mb-1"><a class="text-light text-decoration-none" href="changepassword.php">Change Password</a></button>
          </div>
        </li>
        <li class="row">
          <div class="col">
            <button type="button" class="btn btn-primary w-100"><a class="text-light text-decoration-none" href="logout.php">Sign Out</a></button>
          </div>
        </li>
      </ul>
    </div>
  </div>

<?php } else { ?> <!-- This is to show the Navbar if the user is not logged in -->
  <nav class="navbar navbar-expand-lg bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold text-primary" href="index.php"><img src="images/notess.png" alt="Logo" width="30" height="30" class="hide-bg d-inline-block align-text-top" style="mix-blend-mode: multiply;">Sticky Notes</a>
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link btn btn-outline-primary fw-semibold text-light" href="index.php">Home</a>
        </li>
      </ul>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-item btn btn-outline-primary text-light" href="signup.php">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-item btn btn-outline-primary mx-1 text-light" href="signin.php">Sign In</a>
        </li>
      </ul>
    </div>
  </nav>
<?php } ?>