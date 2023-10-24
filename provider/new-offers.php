<?php
session_start();
// Function to get customer information from the provider_registration table
function getCustomerInfo($customerId) {
  global $conn;
  $sql = "SELECT fullname, profile_picture, address FROM provider_registration WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $customerId);
  if ($stmt->execute()) {
      $result = $stmt->get_result();
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row;
      }
  }
  return array('fullname' => 'N/A', 'address' => 'N/A', 'profile_picture' => 'N/A'); // Provide default values if customer info not found
}
// Function to get the price of a service from the categories table
function getCustomerServicesAndPrices($customerId) {
    global $conn;
    $sql = "SELECT service_name, price FROM customer_services WHERE customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $customerId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $servicesAndPrices = array();

        while ($row = $result->fetch_assoc()) {
            $serviceCustomers = $row['service_name'];
            $priceService = $row['price'];
            $servicesAndPrices[] = array('service_name' => $serviceCustomers, 'price' => $priceService);
            
        }

        return $servicesAndPrices;
    }

    return array();
}
function getServicePrice($service) {
    global $conn;
    $sql = "SELECT price FROM customer_services WHERE service_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $service);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['price'];
        }
    }
    return 'N/A'; // Provide a default value if service price not found
  }
function getCustomerImagesForProvider($customerId, $providerId) {
  global $conn;
  $sql = "SELECT image_path FROM customer_images WHERE customer_id = ? AND provider_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ss', $customerId, $providerId);
  if ($stmt->execute()) {
    $result = $stmt->get_result();
    $images = array();
    while ($row = $result->fetch_assoc()) {
      $images[] = $row['image_path'];
    }
    return $images;
  }
  return array();
}


function getServiceImages($service) {
  global $conn;
  $servicesImages = array();

  // Create a prepared statement to select servicesImages based on service names
  $sql = "SELECT image FROM categories WHERE heading IN (?)";
  $stmt = $conn->prepare($sql);

  if ($stmt) {
      $categories = implode("', '", $service); // Assuming service names are in an array
      $stmt->bind_param('s', $categories);

      if ($stmt->execute()) {
          $result = $stmt->get_result();

          while ($row = $result->fetch_assoc()) {
              $servicesImages[] = $row['image'];
          }
      }
  }

  return $servicesImages;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- GOOGLE FONTS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aaron Burks </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Modal popup -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/sitelogo-singup.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.php -->
        <?php 
     include 'Header.php'
    ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.php -->
            <!-- <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
           <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div> 
        </div>
      </div> -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.php -->
            <?php
      include 'SideMenu.php'
      ?>
            <!-- partial -->
            <div class="main-panel">
                <!-- Modal -->

                <!-- <div class="modal fade" id="confirmationModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Acceptance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body h-auto">
                <h2 class="pb-4">Are you sure you want to accept this offer?</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="acceptOffer(<?php echo $proposalId; ?>)">Accept</button>
            </div>
        </div>
    </div>
</div> -->
                <!-- START ROW MAIN-PANEL -->
                <div class="row">


                    <div class="order-in-progress">
                        <h1><b style="color: #70BE44;">New </b>Offers</h1>
                        <div class="onetime-advancebokingbutton">
                            <ul>
                                <li><a href="new-offers.php"><button style="color: #fff; background-color: #70BE44;">One
                                            Time Service</button></a></li>
                                <li><a href="new-offers-advancebooking.php"><button
                                            style="color: #959595; background-color: #E6E6E6;">Advance
                                            Bookings</button></a></li>
                            </ul>
                        </div>
                        <!-- FIRST NEW OFFER -->
                        <?php
                include 'connection.php';

                $userId = $_SESSION['user_id'];

                $sql = "SELECT * FROM customer_proposal WHERE provider_id = ? AND status = 'new_offer'";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $userId);

                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if ($result->num_rows == 0) {
                      // No orders found for the provider
                      echo '<h2 class="text-center texter">No new orders available.</h2>';
                  } else {
              while ($row = $result->fetch_assoc()) {
                  $proposalId = $row['id'];
                  $customerId = $row['customer_id'];
                  $providerId = $row['provider_id'];
                  $selectedDate = $row['year'] . '-' . $row['month'] . '-' . $row['day'];
                  $selectedTime = $row['selected_time'];
                  $userContent = $row['user_content'];
                  $selectedServices = explode(', ', $row['selected_services']);
                  $totalAmount = $row['total_amount'];
                  $current_time = $row['current_time'];

                  // Retrieve customer name and address based on customerId
                  $customerInfo = getCustomerInfo($customerId);

                  $customerImages = getCustomerImagesForProvider($customerId, $userId);
                  $serviceCustomers = getCustomerServicesAndPrices($customerId);
                  $serviceCustomers1 = getCustomerServicesAndPrices($customerId);
                  
                  
                  // Now you have an array containing the selected services and their prices for the customer
                  
                  // Output the retrieved customer name and address
                  $customerName = $customerInfo['fullname'];
                  $customerAddress = $customerInfo['address'];
                  $profile_picture = $customerInfo['profile_picture'];
                  // $image_path = $customerImages['image_path'];
                ?>
                        <div class="modal fade" id="confirmationModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmationModalLabel">Confirm Acceptance</h5>
                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> -->
                                    </div>
                                    <div class="modal-body h-auto">
                                        <h2 class="pb-4">Are you sure you want to accept this offer?</h2>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                                            onclick="acceptOffer(<?php echo $proposalId; ?>)">Accept</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="rejectionModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- <h5 class="modal-title" id="confirmationModalLabel"></h5> -->
                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> -->
                                    </div>
                                    <div class="modal-body h-auto">
                                        <h2 class="pb-4">Are you sure you want to reject this offer?</h2>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                                            onclick="rejectOffer(<?php echo $proposalId; ?>)">yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- counter modal -->
                       <!-- Counter Offer Modal -->
                        <div class="modal" id="new<?php echo $customerId?>" role="dialog">
                        <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h4 class="modal-title">Your Counter Offer For the services</h4>
                                    </div>
                                     
                                    <div class="modal-body">
                                    <ul class="services-selected-counteroffer">
    <?php
    $platformChargesPercentage = 10; // 10% platform charges

    // Calculate platform charges
    $platformCharges = ($totalAmount * $platformChargesPercentage) / 100;

    // Calculate the amount you'll earn
    $amountYouWillEarn = $totalAmount - $platformCharges;

    // Initialize an index variable for serviceCustomers1
    $serviceCustomers1Index = 0;

    // Iterate through selected services
    foreach ($selectedServices as $service) {
        // Retrieve the price of the service from the categories table
        $serviceImages = getServiceImages([$service]);
        $serviceCustomers1Item = $serviceCustomers1[$serviceCustomers1Index];

        // Get service name and price
        $servicesNew = $serviceCustomers1Item['service_name'];
        $servicePrice = $serviceCustomers1Item['price'];

        // Increment the index for serviceCustomers1
        $serviceCustomers1Index++;

        // Display service images and details
        ?>
        <li>
            <em>
                <?php foreach ($serviceImages as $imagePath) { ?>
                    <img src="../admin/uploads/<?php echo $imagePath ?>" alt="Service Image" />
                <?php } ?>
                <?php echo $servicesNew; ?>
                <span>$<?php echo $servicePrice; ?></span>
            </em>
        </li>
    <?php } ?>

    <li class="totalcharges">
        <em>
            <img src="./images/counteroffer/4.png" /> Total Charges
        </em>
        <span>$<?php echo $totalAmount ?></span>
    </li>
</ul>


                                        <ul class="percent-counter">
                                            <li>
                                                <em>Platform Charges (<?php echo $platformChargesPercentage ?>%)</em>
                                                <span>$<?php echo $platformCharges ?></span>
                                            </li>
                                            <li>
                                                <em>Your will Earn</em>
                                                <span>$<?php echo $amountYouWillEarn ?></span>
                                            </li>
                                        </ul>

                                          <div class="text-area-counter">
                                              <h2>Note To Support Your Counter Offer</h2>
                                              <textarea></textarea>
                                          </div>
                                    </div>

                                    <div class="modal-footer">
                                        <a href="success-popup.php"> <button>Send</button></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="first-offer">
                            <div class="profileheadsection">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div>
                                            <div
                                                style="width:60px;height:60px;border-radius: 112px;margin-bottom:10px;">
                                                <img style="width: 100%;object-fit: fill;height: 100%;border-radius: 118px;"
                                                    src="../customer/<?php echo $profile_picture?>" />
                                            </div>
                                            <h3>
                                                <?php echo $customerName?><br><b>User ID #
                                                    <?php echo $customerId?>
                                                </b>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-flex align-items-center">
                                        <h3 class="address"><img src="./images/mappin.png" />
                                            <?php echo $customerAddress?>
                                        </h3>
                                    </div>
                                    <div class="col-md-3 d-flex align-items-center">
                                        <h6 style="color: #4492BE;"><img src="./images/scheduled.png" />
                                            <?php echo $selectedDate?> /
                                            <?php echo $selectedTime?>
                                        </h6>
                                    </div>
                                    <div class="col-md-3 d-flex align-items-center">
                                        <h4 style="color: #70BE44;font-size: 14px;">Offered On
                                            <?php echo $current_time ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="service-selectedsection">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="order-details-progress">
                                            <h2>Order details</h2>
                                            <ul class="orderdetails-lists">
                                            <?php foreach ($serviceCustomers as $servicenew) {
                                                            $services = $servicenew['service_name'];
                                                            $servicePrice = $servicenew['price'];

                                                            // echo $serviceCustomers; echo "<br/>";
                                                            // echo $servicePrice;echo "<br/>";
                                                            ?>
                                                <li><em><?php echo $services ?></em><span style="color: #70BE44;">$<?php echo $servicePrice; ?></span></li>
                                                <?php
                                            }?>
                                            <li class="total-amount"><em><b>Total amount paid</b></em><span style="color: #70BE44;"><b>$ <?php echo $totalAmount?></b></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Task Description</h6>
                                        <p>
                                            <?php echo $userContent?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="location-images-section">
                                <h2>Location Images </h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="location-images">

                                            <ul class="gallery-images">
                                                <?php
                                      foreach (array_slice($customerImages, 0, 5) as $imagePath) {
                                      ?>
                                                <li>
                                                    <img src="../customer/<?php echo $imagePath; ?>"
                                                        alt="Customer Image" />
                                                </li>
                                                <?php
                                      }
                                      ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </div>

                            <div class="buttons-newoffers" style="padding: 30px 0px;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="javascript:void(0);">
                                            <button type="button" data-toggle="modal" data-target="#confirmationModal"
                                                data-proposal-id="<?php echo $proposalId; ?>">Accept Offer</button>
                                        </a>
                                    </div>



                                    <div class="col-md-4">
                                    <?php
                                    echo  '<a type="button" data-toggle="modal" onclick="' . $customerId . '" data-target="#new' . $customerId . '">';
                                    echo '<button>Counter Offer</button>';
                                    echo '</a>';
                                    ?>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="ignore1"><button data-dismiss="modal" data-target="#rejectionModal">Ignore</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php
              }
            }
        } else {
            echo 'Error executing the query.';
        }
        ?>

                        <!-- END ROW MAIN-PANEL -->
                    </div>
                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->

            <!-- plugins:js -->
            <script>
                function acceptOffer(proposalId) {
                    // Send an AJAX request to update the status to "scheduled_offer"
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'update_status.php'); // Create a PHP file to handle status updates
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.send(JSON.stringify({ proposalId: proposalId, status: 'scheduled_offer' }));

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Handle the server's response here, if needed
                            console.log(xhr.responseText);

                            // Reload the page after the status is updated
                            location.reload(); // This will refresh the current page
                        }
                    };
                }

            </script>
            <script>
                function rejectOffer(proposalId) {
                    // Send an AJAX request to update the status to "scheduled_offer"
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'update_status.php'); // Create a PHP file to handle status updates
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.send(JSON.stringify({ proposalId: proposalId, status: 'reject_offer' }));

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Handle the server's response here, if needed
                            console.log(xhr.responseText);

                            // Reload the page after the status is updated
                            location.reload(); // This will refresh the current page
                        }
                    };
                }

            </script>
            <script src="vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="vendors/chart.js/Chart.min.js"></script>
            <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            <script src="vendors/progressbar.js/progressbar.min.js"></script>

            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="js/off-canvas.js"></script>
            <script src="js/hoverable-collapse.js"></script>
            <script src="js/template.js"></script>
            <script src="js/settings.js"></script>
            <script src="js/todolist.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page-->
            <script src="js/jquery.cookie.js" type="text/javascript"></script>
            <script src="js/dashboard.js"></script>
            <script src="js/Chart.roundedBarCharts.js"></script>
            <script src="script.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
            <!-- End custom js for this page-->
</body>

</html>