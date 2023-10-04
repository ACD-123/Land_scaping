<?php
include 'connection.php'
?>

<header class="navigation fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Egen"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          
          <?php
            // Check if the user is logged in (you may need to adjust this based on your session setup)
            session_start();
            if (isset($_SESSION['user_id'])) {
          ?>
          <!-- These items are shown when the user is logged in -->
          <li class="nav-item">
            <a class="nav-link" href="notifications.php">Notifications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myhirings.php">My Hirings</a>
          </li>
          <?php
            if (isset($_SESSION['user_id'])) {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="./images/user.png" alt="User Profile Picture" class="profile-picture">
              </a>
              <div class="dropdown-menu" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="dashboard.php">Profile</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
              </div>
            </li>
            <?php
            }
            ?>
<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to log out?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="logout.php" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>

          <?php
            } else {
          ?>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>
          <!-- These items are shown when the user is logged out -->
          <li class="nav-item">
            <a class="nav-link" href="notifications.php">Notifications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myhirings.php">My Hirings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="provider.php">Provider</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Signin.php">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Signup.php" target="_blank">Sign Up</a>
          </li>
          <?php
            }
          ?>
        </ul>
      </div>
    </nav>
  </header>