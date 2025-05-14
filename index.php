<?php
include_once('include/header.php');
?>

<!-- This is the Landing Page that the user will come to. -->
<main class="container-lg mt-5">
  <div class="text-center">
    <div class="row justify-content-center">
      <div class="col-2 mt-5">
        <h5>Your Notes...</h5>
      </div>
    </div>
  </div>
  <!-- This for user to enter their notes -->
  <div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 col-sm-12 mt-5 mb-1">
      <div class="card">
        <div class="card-body">
          <h5>New Note</h5>
          <textarea data-textarea="1" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Type something...."></textarea>
          <button type="button" class="btn btn-primary btn-sm m-2" data-bs-toggle="modal" data-bs-target="#signup">Save</button>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mt-5 mb-1">
      <div class="card">
        <div class="card-body">
          <h5>Your Latest Note</h5>
          <textarea data-textarea="2" class="form-control" id="exampleFormControlTextarea1" rows="5" disabled placeholder="Your latest note will show up here"></textarea>
          <button type="button" class="btn btn-primary btn-sm m-2" data-bs-toggle="modal" data-bs-target="#signup">Edit</button>
        </div>
      </div>
    </div>
</main>
<!-- This is a modal to prompt the user to login or sign up in order to start saving their notes -->
<section>
  <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body "><a class="link-offset-1 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="signup.php">Sign up</a> or <a class="link-offset-1 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="signin.php">Sign In</a> to save your notes...</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include_once('include/footer.php');
?>