<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Aaron Burks</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- theme meta -->
  <meta name="theme-name" content="agen" />
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Font Family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
  <!--Favicon-->
  <!-- FONT AWESOME -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body class="dashboard">
  

<header class="navigation fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="index.php"><img src="images/black_logo.png" alt="Egen"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
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
    <a class="dropdown-item" href="#">Profile</a>
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


<section id="dashboard-main-miles">

<div class="dashboard-innermiles">
<div class="container">
    <h2>Dashboard</h2>
    <div class="row">
        <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="miles-runners">
                <number>20</number>
                <p>Completed Tasks</p>
            </div>
        </div>
        <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="miles-runners">
                <number>40</number>
                <p>Scheduled Hiring's</p>
            </div>
        </div>
        <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="miles-runners">
                <number>140</number>
                <p>Recent Offers</p>
            </div>
        </div>
    </div>
</div>
</div>
</section>


<!-- DASHBOARD HIRING START -->

<section id="dashboard-hiringsection" style="padding: 60px 0px;">
<div class="container">

<div class="row">
<div class="col-lg-6 mb-3 mb-lg-0">
<div class="dash-hiring-inner" style="padding: 30px 0px;">
  <h2>My Hiring's</h2>
  <div class="hiring-list-main" style="padding: 30px 30px; margin-bottom: 30px;">
    <div class="dash-text-wthicn">
      <div class="text-inner">
        <img src="./images/hiring/hiring1.png">
        <div class="dash-text-all">
      <h5>David Johnson</h5>
       <h6>Garden Maintenance</h6>
       <h4>Hired On 22,August,2022</h4>
      </div>
      </div>
      <div class="dash-order-list">
<ul>
  <li><em><img src="./images/dashboard/calender.png"/> 21, August,4:00 AM, SUN</em></li>
  <li><em><img src="./images/dashboard/grass2.png"/> Grass Cutting</em></li>
  <li><em><img src="./images/dashboard/grass.png"/> Snowfall removal</em><span>Order#: 783ds8d798c</span></li>
</ul>
      </div>
    </div>
    <div class="schedulebutton">
<a href="#"><button><img src="./images/dashboard/check.png"/> Scheduled</button></a>
    </div>
  </div>

  <!-- 2ND HIRING -->
  <div class="hiring-list-main" style="padding: 30px 30px; margin-bottom: 30px;">
    <div class="dash-text-wthicn">
      <div class="text-inner">
        <img src="./images/hiring/hiring1.png">
        <div class="dash-text-all">
      <h5>David Johnson</h5>
       <h6>Garden Maintenance</h6>
       <h4>Hired On 22,August,2022</h4>
      </div>
      </div>
      <div class="dash-order-list">
<ul>
  <li><em><img src="./images/dashboard/calender.png"/> 21, August,4:00 AM, SUN</em></li>
  <li><em><img src="./images/dashboard/grass2.png"/> Grass Cutting</em></li>
  <li><em><img src="./images/dashboard/grass.png"/> Snowfall removal</em><span>Order#: 783ds8d798c</span></li>
</ul>
      </div>
    </div>
    <div class="ontheway">
<a href="#"><button><img src="./images/dashboard/check.png"/> On the Way</button></a>
    </div>
  </div>

  <!-- 3RD HIRING -->
  <div class="hiring-list-main" style="padding: 30px 30px; margin-bottom: 30px;">
    <div class="dash-text-wthicn">
      <div class="text-inner">
        <img src="./images/hiring/hiring1.png">
        <div class="dash-text-all">
      <h5>David Johnson</h5>
       <h6>Garden Maintenance</h6>
       <h4>Hired On 22,August,2022</h4>
      </div>
      </div>
      <div class="dash-order-list">
<ul>
  <li><em><img src="./images/dashboard/calender.png"/> 21, August,4:00 AM, SUN</em></li>
  <li><em><img src="./images/dashboard/grass2.png"/> Grass Cutting</em></li>
  <li><em><img src="./images/dashboard/grass.png"/> Snowfall removal</em><span>Order#: 783ds8d798c</span></li>
</ul>
      </div>
    </div>
    <div class="schedulebutton">
<a href="#"><button><img src="./images/dashboard/check.png"/> Scheduled</button></a>
    </div>
  </div>
</div>
</div>

<div class="col-lg-6 mb-3 mb-lg-0">
<div class="recent-offer-inner">
  <h2>Recent Offers</h2>
  <div class="recent-text-inner" style="padding: 30px 0px;">
    <img src="./images/hiring/hiring1.png">
    <div class="dash-text-all">
  <h5>David Johnson</h5>
   <h6>Garden Maintenance</h6>
   <h4>offered On 22,August,2022</h4>
  </div>
  <div class="dash-order-list">
    <ul>
      <li><em><img src="./images/dashboard/calender.png"/> 21, August,4:00 AM, SUN</em></li>
      <li><em><img src="./images/dashboard/grass2.png"/> Grass Cutting</em></li>
      <li><em><img src="./images/dashboard/grass.png"/> Snowfall removal</em><span>Counter Offer : $300</span></li>
    </ul>
          </div>
          <div class="recent-button">
            <a href="#"><button> Accept</button></a>
            <a class="decline" href="#"><button> Decline</button></a>
                </div>
  </div>

  <!-- 2ND RECENT OFFER  -->
  <div class="recent-text-inner" style="padding: 30px 0px;">
    <img src="./images/hiring/hiring1.png">
    <div class="dash-text-all">
  <h5>David Johnson</h5>
   <h6>Garden Maintenance</h6>
   <h4>offered On 22,August,2022</h4>
  </div>
  <div class="dash-order-list">
    <ul>
      <li><em><img src="./images/dashboard/calender.png"/> 21, August,4:00 AM, SUN</em></li>
      <li><em><img src="./images/dashboard/grass2.png"/> Grass Cutting</em></li>
      <li><em><img src="./images/dashboard/grass.png"/> Snowfall removal</em><span>Counter Offer : $300</span></li>
    </ul>
          </div>
          <div class="recent-button">
            <a href="#"><button> Accept</button></a>
            <a class="decline" href="#"><button> Decline</button></a>
                </div>
  </div>



  <!-- 3RD RECENT OFFER -->
  <div class="recent-text-inner" style="padding: 30px 0px;">
    <img src="./images/hiring/hiring1.png">
    <div class="dash-text-all">
  <h5>David Johnson</h5>
   <h6>Garden Maintenance</h6>
   <h4>offered On 22,August,2022</h4>
  </div>
  <div class="dash-order-list">
    <ul>
      <li><em><img src="./images/dashboard/calender.png"/> 21, August,4:00 AM, SUN</em></li>
      <li><em><img src="./images/dashboard/grass2.png"/> Grass Cutting</em></li>
      <li><em><img src="./images/dashboard/grass.png"/> Snowfall removal</em><span>Counter Offer : $300</span></li>
    </ul>
          </div>
          <div class="recent-button">
            <a href="#"><button> Accept</button></a>
            <a class="decline" href="#"><button> Decline</button></a>
                </div>
  </div>
</div>
</div>

</div>
<!-- ROW END -->


</div>
<!-- CONTAINER END -->
</section>



<!-- DASHBOARD HIRING END -->


<!-- footer start -->
<footer id="footer-section">
<div class="container">
  <div class="footer-widgets">
    <div class="row" style="padding: 60px 0px 30px 0px;">
      <div class="col-lg-3 mb-3 mb-lg-0">
        <img class="footerlogo" src="./images/footerlogo.png" width="100%"/>
        <div class="social-links">
          <ul>
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 mb-3 mb-lg-0">
        <h4>Company</h4>
        <div class="nav-links-footer">
          <ul>
            <li><a href="#">About</a></li>
            <li><a href="#">Commericals</a></li>
            <li><a href="#">Exclusive</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">residential individuals</a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 mb-3 mb-lg-0">
        <h4>Contact</h4>
        <div class="nav-links-footer">
          <ul>
            <li><a href="#">Help/FAQs</a></li>
            <li><a href="#">Press</a></li>
            <li><a href="#">Affilates</a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 mb-3 mb-lg-0">
        <h4>Services</h4>
        <div class="nav-links-footer">
          <ul>
            <li><a href="#">Lawn Mowing</a></li>
            <li><a href="#">Grass cutting</a></li>
            <li><a href="#">Spring Clean up</a></li>
            <li><a href="#">Lawn Maintenance</a></li>
            <li><a href="#">Seeding/ Aeration</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="footer-copyright">
  <div class="container">
<p>Copyright are Reserved@Apexcreativedesign.com</p>
  </div>
</div>
</footer>

<!-- footer end -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- shuffle -->
<script src="plugins/shuffle/shuffle.min.js"></script>
<!-- apear js -->
<script src="plugins/counto/apear.js"></script>
<!-- counter -->
<script src="plugins/counto/counTo.js"></script>
<!-- card slider -->
<script src="plugins/card-slider/js/card-slider-min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>
