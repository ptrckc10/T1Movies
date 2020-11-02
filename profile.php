<?php

session_start();

include('header.php');
include('navbar.php');

?>

<div class="container">
    <h1>Hey
        <b>
            <?php echo htmlspecialchars($_SESSION["username"]); ?>
            <?php echo htmlspecialchars($_SESSION["email"]); ?>
        </b>
        ! Welcome to Profile</h1>
</div>

<?php include('footer.php'); ?>