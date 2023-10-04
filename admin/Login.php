<?php
include 'connection.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$error_message = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user data from the database based on the provided email
    $sql = "SELECT * FROM provider_registration WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        $user_role = $row['role_id'];

        // Verify the provided password against the hashed password in the database
        if (password_verify($password, $hashed_password)) {
            // Password is correct, user is authenticated

            // Check if the user has admin role (role_id = 1)
            if ($user_role == 1) {
                // Create a session for the admin
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_role'] = $user_role;
            
                // Redirect the admin to the admin dashboard or any other admin-specific page
                header("Location: dashboard.php");
                exit;
            } else {
                $error_message = "You don't have permission to access this admin panel.";
            }
        } else {
            $error_message = "Invalid password. Please try again.";
        }
    } else {
        $error_message = "User with this email does not exist.";
    }
}

session_start()

?>


<!DOCTYPE html>
<html class="signup-page-build" lang="zxx">

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
  <link rel="stylesheet" href="../assets/plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="../assets/plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="../assets/plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="../assets/plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="../assets/plugins/card-slider/css/style.css">

  <!-- Main Stylesheet -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <!-- Font Family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
  <!--Favicon-->
  <!-- FONT AWESOME -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">

</head>

<body id="sign-up-page">
    <section id="sign-up-form">
            <div class="row justify-content-center h-100"> 

                <div class="col-lg-7 mb-3" style="padding: 110px;">

                    <div style="text-align: center;" class="sign-up-inner signin">
                      <a href="index.php">
                        <div class="site-logo-form">
                            <img src="../assets/images/signup/sitelogo-singup.png"/>
                        </div>
                        </a>
                        <h2 style="padding: 20px 0px;">Admin Login</h2>
                        <img style="margin-bottom: 5px; padding: 20px 0px;" width="auto" src="../assets/images/Line 43.png"/>
                          <div style="padding: 20px 0px;" class="sign-up-register-social">
                            
                            <div class="social-links-signup">
                                <ul>
                                    <li><a href="#"><img src="../assets/images/social/2.png"/></a></li>
                                    <li><a href="#"><img src="../assets/images/social/1.png"/></a></li>
                                </ul>
                            </div>
                            <h4 style="padding: 20px 0px;">Or use your email account</h4>
                          </div>

                          <form id="contact" action="" method="post">
                            <fieldset>
                              <input placeholder="Email" name="email" type="email" tabindex="1" required autofocus>
                            </fieldset>
                            <fieldset>
                                <input placeholder="Password" name="password" type="text" tabindex="6" required>
                              </fieldset>
                              <fieldset class="check">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
  <label for="vehicle1"> Remember me </label> 
                              </fieldset>
                              <div id="error-messages" style="color:red;"></div>

                              <div class="forgotpasword">
                                <a href="#">Forgot Password</a>
                              </div>
                              <fieldset>
                                <button type="submit" name="login" id="contact-submit" data-submit="...Sending">Sign in</button>
                              </fieldset>
                          </form>
                    </div>

                    <div class="policies-signin">
                        <ul>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                </div>

                <div class="col-lg-5 mb-3 mb-lg-0 mx-auto" style="background-image: url(../assets/images/signup/signinbg.png); background-repeat: no-repeat;
                background-size: cover; padding: 270px 30px;">
                    
                    <p>Hello, Friend! <br><b>Fill Your Info and start<br> a journey with us</b></p>
                    <a href="registeration.php"><button>Sign Up</button></a>
                </div>
<!-- row end -->
            </div>
    </section>

<!-- footer end -->
<script>
    // Check if the error message variable is not empty
    var errorMessage = "<?php echo $error_message; ?>";
    if (errorMessage !== "") {
      // Display the error message in the error <div>
      document.getElementById("error-messages").textContent = errorMessage;
    }
  </script>
<!-- jQuery -->
<script src="../assets/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="../assets/plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="../assets/plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="../assets/plugins/venobox/venobox.min.js"></script>
<!-- shuffle -->
<script src="../assets/plugins/shuffle/shuffle.min.js"></script>
<!-- apear js -->
<script src="../assets/plugins/counto/apear.js"></script>
<!-- counter -->
<script src="../assets/plugins/counto/counTo.js"></script>
<!-- card slider -->
<script src="../assets/plugins/card-slider/js/card-slider-min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="../assets/plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="../assets/js/script.js"></script>

</body>
</html>