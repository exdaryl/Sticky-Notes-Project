<!-- This is the footer of our website -->
<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="menu list-unstyled d-flex justify-content-center align-items-center">
                    <?php if (isset($_SESSION['is_logged_in'])) { ?> <!-- This is what the footer will look like if the user is logged in -->
                        <li><a class="text-decoration-none me-2 fw-semibold link-light link-opacity-50 link-opacity-100-hover" href="dashboard.php">Home</a></li>
                        <li><a class="text-decoration-none me-2 fw-semibold link-light link-opacity-50 link-opacity-100-hover" href="allnotes.php">All Notes</a></li>
                    <?php } else { ?> <!-- This is what the footer will look like if the user is not logged in -->
                        <li><a class="text-decoration-none me-2 fw-semibold link-light link-opacity-50 link-opacity-100-hover" href="index.php">Home</a></li>
                        <li><a class="text-decoration-none me-2 fw-semibold link-light link-opacity-50 link-opacity-100-hover" href="signin.php">Sign In</a></li>
                        <li><a class="text-decoration-none me-2 fw-semibold link-light link-opacity-50 link-opacity-100-hover" href="signup.php">Sign Up</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="m-0">&#169; 2024 CHMSM Sdn. Bhd. (281429-M), All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>