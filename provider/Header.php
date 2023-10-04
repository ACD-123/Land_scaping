<?php
include '../connection.php';
?>

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="dashboard.php">
            <img src="images/sitelogo-singup.png" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="dashboard.php">
            <img src="images/sitelogo-singup.png" alt="logo" />
          </a>
        </div>
      </div>
      <div style="padding: 20px 20px;" class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h4 style="color: #70BE44; padding-top: 30px;">Hey!</h4>
            <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">
              <?php
            // Replace 'YourUserID' with the actual user ID of the logged-in user
            $userId = 'id';

            // Query to fetch user data
            $userDataQuery = "SELECT fullname FROM provider_registration WHERE id = $userId";

            $result = $conn->query($userDataQuery);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo $row['fullname'];
            } else {
                echo "User Not Found";
            }
            ?>
            </span></h1>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
           <a href="dashboard.php"><img class="hmesec" src="./images/home.PNG"/></a>
          </li>
          <li><a class="location-buton" href="#"><button><i class="menu-icon mdi mdi-map-marker"></i>
          <?php
            // Replace 'YourUserID' with the actual user ID of the logged-in user
            $userId = 'id';
            // Query to fetch user data
            $userDataQuery = "SELECT id, address, country, city FROM provider_registration WHERE id = $userId";
            
            
            $result = $conn->query($userDataQuery);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $id = $row['id'];
              $address = $row['address'];
              $country = $row['country'];
              $city = $row['city'];
            }
            ?>
            <?php echo $address; ?>, 
            <?php echo $country; ?>, 
            <?php echo $city; ?>
        </button></a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <div class="text-profile">
                <div class="profiletext-imagesec">
                    <h2>
                        <?php
                        // Replace 'YourUserID' with the actual user ID of the logged-in user
                        $userId = 'id';

                        // Query to fetch user data
                        $userDataQuery = "SELECT fullname FROM provider_registration WHERE id = $userId";

                        $result = $conn->query($userDataQuery);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['fullname'];
                        } else {
                            echo "User Not Found";
                        }
                        ?>
                    </h2>
                    <p>
                        <?php
                        // Query to fetch additional user data like ID and profile image
                        $additionalDataQuery = "SELECT id, profile_picture FROM provider_registration WHERE id = $userId";

                        $result = $conn->query($additionalDataQuery);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $id = $row['id'];
                            $profileImage = $row['profile_picture'];

                            // Display ID
                            echo 'ID#' . $id;
                        }
                        ?>
                    </p>
                </div>

                <div class="dropdown">
    <!-- profile image -->
    <a class="nav-link dropdown-toggle" id="UserDropdown" href="http://localhost/aron_burks/assets/<?php echo $profileImage; ?>
" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img class="img-xs rounded-circle" src="http://localhost/aron_burks/assets/<?php echo $profileImage; ?>" alt="Profile image">
    </a>
    <!-- profile image end -->
    <ul class="dropdown-menu dropdown-menu-right" style="position: absolute;left: -43px;" aria-labelledby="UserDropdown">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><a class="dropdown-item" href="#" onclick="confirmLogout()">Logout</a></li>
    </ul>
</div>
            </div>
        </li>
    </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                // User confirmed, perform logout and redirect
                window.location.href = "logout.php";
            }
        }
    </script>