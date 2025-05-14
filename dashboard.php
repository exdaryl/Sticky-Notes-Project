<?php
session_start();
if (!isset($_SESSION['is_logged_in'])) {
  $_SESSION['error'] = "Error: Unauthorised access. Please login.";
  header("Location: signin.php");
  exit;
}

// This will include the header to the webpage
require_once('include/header.php');

// This code is responsible for saving a note submitted via a form to the database.
require_once('database.php');

if (isset($_POST['user_id'], $_POST['content'], $_POST['timestamp'])) {
  $user_id = $_POST['user_id'];
  $content = $_POST['content'];
  $timestamp = $_POST['timestamp'];

  $db = open_database();
  if ($db->connect_error || !add_note($db, $user_id, $content, $timestamp)) {
    $_SESSION['error'] = "Error: Failed to save note. Try again!";
    header("Location: dashboard.php");
    exit;
  }
  close_database($db);
}
?>
<main class="container-lg">
  <div class="row justify-content-center"> <!-- This is what the user will where the user can start typing and save their notes. -->
    <div class="col-lg-4 col-md-6 col-sm-12 mt-5 mb-1">
      <div class="card mt-5">
        <div class="card-body">
          <form method="POST" action="savenote.php">
            <h5>New Note</h5>
            <!-- This will show an error message to the user which is set in the PHP script -->
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
            <textarea data-textarea="1" maxlength="150" class="form-control" name="content" id="content" rows="5" placeholder="Type something...."></textarea>
            <div id="count">
              <span id="current_count">0</span> / <span id="maximum_count">150</span>
            </div>
            <button type="submit" class="btn btn-primary btn-sm my-2">Save</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12 mt-5 mb-5">
      <div class="card mt-5">
        <div class="card-body">
          <!-- This is the PHP function to show the latest not in the dashboard -->
          <?php
          require_once('database.php');
          $mysqli = open_database();

          $notes = get_notes($mysqli, $_SESSION['user_id']);
          $latest_note = !empty($notes) ? $notes[0] : null;

          close_database($mysqli);
          echo '<form method="POST" action="updatenote.php?id=', $latest_note['id'], '">';
          if ($latest_note) {
            echo "<h5>Your Latest Note</h5>";
            echo "<div><textarea data-textarea=\"1\" class=\"form-control\" name=\"content\" id=\"content\" rows=\"5\" disabled>{$latest_note['content']}</textarea></div>";
          } else {
            echo "<div><textarea data-textarea=\"1\" class=\"form-control\" name=\"content\" id=\"content\" rows=\"5\" disabled>Your recent note will appear here</textarea></div>";
          }
          ?>
          <button type="submit" class="btn btn-primary btn-sm my-2">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- This will include the footer to the webpage -->
<?php
require_once('include/footer.php');
?>