<?php
session_start();
// Function to get customer information from the provider_registration table
function getCustomerInfo($providerId) {
  global $conn;
  $sql = "SELECT fullname, profile_picture, address FROM provider_registration WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $providerId);
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
function getCustomerServicesAndPrices($providerId, $proposalId, $userId) {
    global $conn;
    $sql = "SELECT service_name, price, counter_price FROM customer_services WHERE provider_id = ? AND proposal_id = ? AND customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $providerId, $proposalId, $userId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $servicesAndPrices = array();

        while ($row = $result->fetch_assoc()) {
            $serviceCustomers = $row['service_name'];
            $priceService = $row['price'];
            $counterPrice = $row['counter_price'];
            $servicesAndPrices[] = array('service_name' => $serviceCustomers, 'price' => $priceService, 'counter_price' => $counterPrice);
            // print_r($servicesAndPrices);
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
  function getCustomerImagesForProvider($providerId, $proposalId, $customerId) {
    global $conn;
    $sql = "SELECT image_path FROM customer_images WHERE provider_id = ? AND proposal_id = ? AND customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $providerId, $proposalId, $customerId);
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
<html lang="zxx" class="myhirings">

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
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
    rel="stylesheet">
  <!--Favicon-->
  <!-- FONT AWESOME -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body class="services-page dashboard">


  
<?php
include 'Black_logo_header.php'
?>

  <section id="my-hiringpanel">

    <div class="container">
      <div class="myoffer-button-serv">
        <h2 style="color: #000; font-weight: bold;">My Hirings</h2>
        <p style="color: #70BE44;">Here are your past services you availed and hired!</p>
        <ul>
          <li><a href="#"><button style="background-color: #70BE44; font-family: Cairo;
                font-size: 30px;
                font-weight: 600;
                line-height: 56px;
                letter-spacing: 0em;
                text-align: left;
                color: #fff;
                ">One Time Service</button></a></li>
          <li><a href="#"><button style="background-color: #E6E6E6; font-family: Cairo;
                font-size: 30px;
                font-weight: 600;
                line-height: 56px;
                letter-spacing: 0em;
                text-align: left;
                color: #9D9D9D;
                ">Advance Booking</button></a></li>
        </ul>
      </div>
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Scheduled</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Pending</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">In progress</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Completed</a>
        </li>
      </ul><!-- Tab panes -->
    </div>

    <div class="tab-content">


      <div class="tab-pane active" id="tabs-1" role="tabpanel">
      <?php
              include 'connection.php';

              $userId = $_SESSION['user_id'];

              $sql = "SELECT * FROM customer_proposal WHERE customer_id = ? AND status = 'scheduled_offer'";
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
                $counterTotall = $row['counter_totall'];
                $current_time = $row['current_time'];

                // Retrieve customer name and address based on customerId
                $customerInfo = getCustomerInfo($providerId);

                $customerImages = getCustomerImagesForProvider($providerId, $proposalId, $customerId);
                $serviceCustomers = getCustomerServicesAndPrices($providerId, $proposalId, $userId);
                $serviceCustomers1 = getCustomerServicesAndPrices($providerId, $proposalId, $userId);
                
                
                // Now you have an array containing the selected services and their prices for the customer
                
                // Output the retrieved customer name and address
                $customerName = $customerInfo['fullname'];
                $customerAddress = $customerInfo['address'];
                $profile_picture = $customerInfo['profile_picture'];
            ?>
        <!-- hiring panel start -->
        <section id="hiring" style="padding: 60px 0px;">
          <div class="container">
            <div class="hiring-inner">
              <div class="row first-inner">
                <div class="col-lg-3 mb-3 mb-lg-0">
                  <div class="textwith-icon1">
                    <img src="../provider/<?php echo $profile_picture?>" />
                    <div class="text-inner">
                      <?php echo $providerId?>
                      <h5><?php echo $customerName?></h5>
                      <h6>Garden Maintenance</h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">
                    <i class="fa fa-check" aria-hidden="true"></i> 50+ Completed task
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">
                    <i class="fa fa-clock" aria-hidden="true"></i> <?php echo $selectedDate , str_repeat('&nbsp;', 5), $selectedTime?>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2 last-textinner">
                    <ul class="button-sec">
                      <li><a href="#">Cancel Service</a></li>
                      <li><a href="#"><button>Scheduled</button></a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="row second-inner">
                <div class="col-lg-5 mb-8 mb-lg-0">
                  <h2>Services Selected</h2>
                  <div class="pricedetails">
                    <ul>
                    <?php $displayTotal = isset($counterTotall) ? $counterTotall : $totalAmount;
                          foreach ($serviceCustomers as $servicenew) {
                              $services = $servicenew['service_name'];
                              $servicePrice = $servicenew['price'];
                              
                              // Check if counter service price is available
                              if (isset($servicenew['counter_price'])) {
                                  $counterPrice = $servicenew['counter_price'];
                              } else {
                                  // If counter price is not available, use the original service price
                                  $counterPrice = $servicePrice;
                              }
                        ?>
                            <li>
                                <em><?php echo $services ?></em>
                                <span style="color: #70BE44;">$<?php echo $counterPrice ?></span>
                            </li>
                        <?php } ?>
                            <li class="custom-total-price">
                                <em>Total Cost offer</em>
                                <span style="color: #70BE44;">$<?php echo $displayTotal ?></span>
                            </li>
                    </ul>
                  </div>


                </div>
                <div class="col-lg-1 mb-1 mb-lg-0"></div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="task">
                    <h2>Task Description</h2>
                    <p><?php echo $userContent?></p>
                  </div>
                </div>
              </div>

              <div class="row-second-inner">
                <div class="panel content<?php echo $proposalId?> hidden">
                  <div class="gallery-servces moretext">
                    <h2>Service Place</h2>
                    <ul class="my-galleryserv">
                    <?php
                            foreach (array_slice($customerImages, 0, 5) as $imagePath) {
                            ?>
                                <li>
                                    <img src="../customer/<?php echo $imagePath; ?>" alt="Customer Image" />
                                </li>
                            <?php
                            }
                            ?>
                    </ul>
                  </div>
                </div>

                <a class="btn flip read-more-button<?php echo $proposalId?>">See More</a>

              </div>

            </div>

          </div>
        </section>
        <script>
        const content<?php echo $proposalId ?> = document.querySelector('.content<?php echo $proposalId ?>');
        const readMoreButton<?php echo $proposalId ?> = document.querySelector('.read-more-button<?php echo $proposalId ?>');

        readMoreButton<?php echo $proposalId ?>.addEventListener('click', function () {
            if (content<?php echo $proposalId ?>.classList.contains('hidden')) {
                content<?php echo $proposalId ?>.classList.remove('hidden');
                readMoreButton<?php echo $proposalId ?>.textContent = 'See Less';
            } else {
                content<?php echo $proposalId ?>.classList.add('hidden');
                readMoreButton<?php echo $proposalId ?>.textContent = 'See More';
            }
        });
    </script>
        <?php
     }
    }
} else {
    echo 'Error executing the query.';
}
?>
      <!-- HIring Panel End -->
      </div>


      <div class="tab-pane" id="tabs-2" role="tabpanel">
      <?php
              include 'connection.php';

              $userId = $_SESSION['user_id'];

              $sql = "SELECT * FROM customer_proposal WHERE customer_id = ? AND status = 'new_offer'";
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
                $customerInfo = getCustomerInfo($providerId);

                $customerImages = getCustomerImagesForProvider($providerId, $proposalId, $customerId);
                $serviceCustomers = getCustomerServicesAndPrices($providerId, $proposalId, $userId);
                $serviceCustomers1 = getCustomerServicesAndPrices($providerId, $proposalId, $userId);
                
                
                // Now you have an array containing the selected services and their prices for the customer
                
                // Output the retrieved customer name and address
                $customerName = $customerInfo['fullname'];
                $customerAddress = $customerInfo['address'];
                $profile_picture = $customerInfo['profile_picture'];
            ?>
        <section id="hiring" style="padding: 60px 0px;">
          <div class="container">
            <div class="hiring-inner">
              <div class="row first-inner">
                <div class="col-lg-3 mb-3 mb-lg-0">
                  <div class="textwith-icon1">
                    <img src="../provider/<?php echo $profile_picture?>" />
                    <div class="text-inner">
                      <h5><?php echo $customerName?></h5>
                      <h6>Garden Maintenance</h6>
                      <a href="message.php"><button class="messagebutton"
                          style="background-color: #70BE44; color: #fff;">Message Provider</button></a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">
                    <p><img src="./images/strr.png" />4.9</p>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">

                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2 last-textinner">
                    <ul class="button-sec">
                      <li><a href="#">Verify</a></li>
                      <li class="arrive1d"><a href="#"><button>Arrived</button></a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="row second-inner">
                <div class="col-lg-5 mb-8 mb-lg-0">
                  <h2>Services Selected</h2>
                  <div class="pricedetails">
                    <ul>
                    <?php foreach ($serviceCustomers as $servicenew) {
                            $services = $servicenew['service_name'];
                            $servicePrice = $servicenew['price'];
                            // echo $serviceCustomers; echo "<br/>";
                            // echo $servicePrice;echo "<br/>";
                          ?>
                      <li><em><?php echo  $services?></em> <span style="color: #70BE44;">$ <?php echo  $servicePrice?></span></li>
                      <?php } ?>
                      <li class="custom-total-price"><em>Total Cost offer</em> <span style="color: #70BE44;">$
                          <?php echo $totalAmount?></span></li>
                    </ul>
                  </div>

                </div>
                <div class="col-lg-1 mb-1 mb-lg-0"></div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="task">
                    <h2>Task Description</h2>
                    <p><?php echo $userContent?></p>
                  </div>
                </div>
              </div>

              <div class="row-second-inner">
                <div class="panel content<?php echo $proposalId?> hidden">
                  <div class="gallery-servces moretext">
                    <h2>Service Place</h2>
                    <ul class="my-galleryserv">
                    <?php
                            foreach (array_slice($customerImages, 0, 5) as $imagePath) {
                            ?>
                                <li>
                                    <img src="../customer/<?php echo $imagePath; ?>" alt="Customer Image" />
                                </li>
                            <?php
                            }
                            ?>
                    </ul>
                  </div>
                </div>

                <a class="btn flip read-more-button<?php echo $proposalId?>">See More</a>

              </div>

            </div>

          </div>
        </section>

        <script>
        const content<?php echo $proposalId ?> = document.querySelector('.content<?php echo $proposalId ?>');
        const readMoreButton<?php echo $proposalId ?> = document.querySelector('.read-more-button<?php echo $proposalId ?>');

        readMoreButton<?php echo $proposalId ?>.addEventListener('click', function () {
            if (content<?php echo $proposalId ?>.classList.contains('hidden')) {
                content<?php echo $proposalId ?>.classList.remove('hidden');
                readMoreButton<?php echo $proposalId ?>.textContent = 'See Less';
            } else {
                content<?php echo $proposalId ?>.classList.add('hidden');
                readMoreButton<?php echo $proposalId ?>.textContent = 'See More';
            }
        });
    </script>
        <?php
     }
    }
} else {
    echo 'Error executing the query.';
}
?>
       
      </div>



      <div class="tab-pane" id="tabs-3" role="tabpanel">
      <?php
              include 'connection.php';

              $userId = $_SESSION['user_id'];

              $sql = "SELECT * FROM customer_proposal WHERE customer_id = ? AND status = 'order_in_progress'";
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
                $customerInfo = getCustomerInfo($providerId);

                $customerImages = getCustomerImagesForProvider($providerId, $proposalId, $customerId);
                $serviceCustomers = getCustomerServicesAndPrices($providerId, $proposalId, $userId);
                $serviceCustomers1 = getCustomerServicesAndPrices($providerId, $proposalId, $userId);
                
                
                // Now you have an array containing the selected services and their prices for the customer
                
                // Output the retrieved customer name and address
                $customerName = $customerInfo['fullname'];
                $customerAddress = $customerInfo['address'];
                $profile_picture = $customerInfo['profile_picture'];
            ?>
        <section id="hiring" style="padding: 60px 0px;">
          <div class="container">
            <div class="hiring-inner">
              <div class="row first-inner">
                <div class="col-lg-3 mb-3 mb-lg-0">
                  <div class="textwith-icon1">
                    <img src="../provider/<?php echo $profile_picture?>" />
                    <div class="text-inner">
                      <h5><?php echo $customerName?></h5>
                      <h6>Garden Maintenance</h6>
                      <a href="message.php"><button class="messagebutton"
                          style="background-color: #70BE44; color: #fff;">Message Provider</button></a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">
                    <p><img src="./images/strr.png" />4.9</p>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">

                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2 last-textinner">
                    <ul class="button-sec">
                      <li><a href="#">Verify</a></li>
                      <li class="arrive1d"><a href="#"><button>Arrived</button></a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="row second-inner">
                <div class="col-lg-5 mb-8 mb-lg-0">
                  <h2>Services Selected</h2>
                  <div class="pricedetails">
                    <ul>
                    <?php foreach ($serviceCustomers as $servicenew) {
                            $services = $servicenew['service_name'];
                            $servicePrice = $servicenew['price'];
                            // echo $serviceCustomers; echo "<br/>";
                            // echo $servicePrice;echo "<br/>";
                          ?>
                      <li><em><?php echo  $services?></em> <span style="color: #70BE44;">$ <?php echo  $servicePrice?></span></li>
                      <?php } ?>
                      <li class="custom-total-price"><em>Total Cost offer</em> <span style="color: #70BE44;">$
                          <?php echo $totalAmount?></span></li>
                    </ul>
                  </div>

                </div>
                <div class="col-lg-1 mb-1 mb-lg-0"></div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="task">
                    <h2>Task Description</h2>
                    <p><?php echo $userContent?></p>
                  </div>
                </div>
              </div>

              <div class="row-second-inner">
                <div class="panel content<?php echo $proposalId?> hidden">
                  <div class="gallery-servces moretext">
                    <h2>Service Place</h2>
                    <ul class="my-galleryserv">
                    <?php
                            foreach (array_slice($customerImages, 0, 5) as $imagePath) {
                            ?>
                                <li>
                                    <img src="../customer/<?php echo $imagePath; ?>" alt="Customer Image" />
                                </li>
                            <?php
                            }
                            ?>
                    </ul>
                  </div>
                </div>

                <a class="btn flip read-more-button<?php echo $proposalId?>">See More</a>

              </div>

            </div>

          </div>
        </section>

        <script>
        const content<?php echo $proposalId ?> = document.querySelector('.content<?php echo $proposalId ?>');
        const readMoreButton<?php echo $proposalId ?> = document.querySelector('.read-more-button<?php echo $proposalId ?>');

        readMoreButton<?php echo $proposalId ?>.addEventListener('click', function () {
            if (content<?php echo $proposalId ?>.classList.contains('hidden')) {
                content<?php echo $proposalId ?>.classList.remove('hidden');
                readMoreButton<?php echo $proposalId ?>.textContent = 'See Less';
            } else {
                content<?php echo $proposalId ?>.classList.add('hidden');
                readMoreButton<?php echo $proposalId ?>.textContent = 'See More';
            }
        });
    </script>
        <?php
     }
    }
} else {
    echo 'Error executing the query.';
}
?>


       
      </div>

      <div class="tab-pane rteserves" id="tabs-4" role="tabpanel">
        <section id="hiring" class="rateservices" style="padding: 60px 0px;">
          <div class="container">
            <div class="hiring-inner">
              <div class="row first-inner">
                <div class="col-lg-3 mb-3 mb-lg-0">
                  <div class="textwith-icon1">
                    <img src="./images/hiring/hiring1.png" />
                    <div class="text-inner">
                      <h5>David Johnson</h5>
                      <h6>Garden Maintenance</h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">
                    <p><img src="./images/strr.png" />4.9</p>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">

                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2 last-textinner">
                    <ul class="button-sec">
                      <li><a style="color: #FF4D00;" href="#">Service Completed</a></li>
                      <li class="completed"><a href="#"><button onclick="showPopup()">Rate Service</button></a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="row second-inner">
                <div class="col-lg-5 mb-8 mb-lg-0">
                  <h2>Services Selected</h2>
                  <div class="pricedetails">
                    <ul>
                      <li><em>Lawn mowing</em> <span style="color: #70BE44;">$ 100.00</span></li>
                      <li><em>Snow Removal</em> <span style="color: #70BE44;">$ 100.00</span></li>
                      <li><em>Grass Cutting</em> <span style="color: #70BE44;">$ 100.00</span></li>
                      <li class="custom-total-price"><em>Total Cost offer</em> <span style="color: #70BE44;">$
                          300.00</span></li>
                    </ul>
                  </div>

                </div>
                <div class="col-lg-1 mb-1 mb-lg-0"></div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="task">
                    <h2>Task Description</h2>
                    <p>I'm Stuck at Norway highway near Crown valley street,
                      I have to wash & tint my car as soon as possible because
                      of this extreme sunny weather. kindly come fast ASAP I'm
                      waiting for you service. </p>
                  </div>
                </div>
              </div>

              <div class="row-second-inner">
                <div id="panel">
                  <div class="gallery-servces moretext">
                    <h2>Service Place</h2>
                    <ul class="my-galleryserv">
                      <li><img src="./images/hiring/gallery1.png" /></li>
                      <li><img src="./images/hiring/gallery2.png" /></li>
                      <li><img src="./images/hiring/gallery3.png" /></li>
                      <li><img src="./images/hiring/gallery4.png" /></li>
                    </ul>
                  </div>
                </div>

                <a id="flip" class="btn">Read More</a>

              </div>

            </div>

          </div>
        </section>


        <section id="hiring" style="padding: 60px 0px;">
          <div class="container">
            <div class="hiring-inner">
              <div class="row first-inner">
                <div class="col-lg-3 mb-3 mb-lg-0">
                  <div class="textwith-icon1">
                    <img src="./images/hiring/hiring1.png" />
                    <div class="text-inner">
                      <h5>David Johnson</h5>
                      <h6>Garden Maintenance</h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">
                    <p><img src="./images/strr.png" />4.9</p>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">

                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2 last-textinner">
                    <ul class="button-sec">
                      <li><a style="color: #FF4D00;" href="#">Service Completed</a></li>
                      <li class="completed"><a href="#"><button onclick="showPopup()">Rate Service</button></a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="row second-inner">
                <div class="col-lg-5 mb-8 mb-lg-0">
                  <h2>Services Selected</h2>
                  <div class="pricedetails">
                    <ul>
                      <li><em>Lawn mowing</em> <span style="color: #70BE44;">$ 100.00</span></li>
                      <li><em>Snow Removal</em> <span style="color: #70BE44;">$ 100.00</span></li>
                      <li><em>Grass Cutting</em> <span style="color: #70BE44;">$ 100.00</span></li>
                      <li class="custom-total-price"><em>Total Cost offer</em> <span style="color: #70BE44;">$
                          300.00</span></li>
                    </ul>
                  </div>

                </div>
                <div class="col-lg-1 mb-1 mb-lg-0"></div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="task">
                    <h2>Task Description</h2>
                    <p>I'm Stuck at Norway highway near Crown valley street,
                      I have to wash & tint my car as soon as possible because
                      of this extreme sunny weather. kindly come fast ASAP I'm
                      waiting for you service. </p>
                  </div>
                </div>
              </div>

              <div class="row-second-inner">
                <div id="panel">
                  <div class="gallery-servces moretext">
                    <h2>Service Place</h2>
                    <ul class="my-galleryserv">
                      <li><img src="./images/hiring/gallery1.png" /></li>
                      <li><img src="./images/hiring/gallery2.png" /></li>
                      <li><img src="./images/hiring/gallery3.png" /></li>
                      <li><img src="./images/hiring/gallery4.png" /></li>
                    </ul>
                  </div>
                </div>

                <a id="flip" class="btn">Read More</a>

              </div>

            </div>

          </div>
        </section>




        <section id="hiring" style="padding: 60px 0px;">
          <div class="container">
            <div class="hiring-inner">
              <div class="row first-inner">
                <div class="col-lg-3 mb-3 mb-lg-0">
                  <div class="textwith-icon1">
                    <img src="./images/hiring/hiring1.png" />
                    <div class="text-inner">
                      <h5>David Johnson</h5>
                      <h6>Garden Maintenance</h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">
                    <p><img src="./images/strr.png" />4.9</p>
                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2">

                  </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0 align-self-center">
                  <div class="textwith-icon2 last-textinner">
                    <ul class="button-sec">
                      <li><a style="color: #FF4D00;" href="#">Service Completed</a></li>
                      <li class="completed"><a href="#"><button onclick="showPopup()">Rate Service</button></a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="row second-inner">
                <div class="col-lg-5 mb-8 mb-lg-0">
                  <h2>Services Selected</h2>
                  <div class="pricedetails">
                    <ul>
                      <li><em>Lawn mowing</em> <span style="color: #70BE44;">$ 100.00</span></li>
                      <li><em>Snow Removal</em> <span style="color: #70BE44;">$ 100.00</span></li>
                      <li><em>Grass Cutting</em> <span style="color: #70BE44;">$ 100.00</span></li>
                      <li class="custom-total-price"><em>Total Cost offer</em> <span style="color: #70BE44;">$
                          300.00</span></li>
                    </ul>
                  </div>

                </div>
                <div class="col-lg-1 mb-1 mb-lg-0"></div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="task">
                    <h2>Task Description</h2>
                    <p>I'm Stuck at Norway highway near Crown valley street,
                      I have to wash & tint my car as soon as possible because
                      of this extreme sunny weather. kindly come fast ASAP I'm
                      waiting for you service. </p>
                  </div>
                </div>
              </div>

              <div class="row-second-inner">
                <div id="panel">
                  <div class="gallery-servces moretext">
                    <h2>Service Place</h2>
                    <ul class="my-galleryserv">
                      <li><img src="./images/hiring/gallery1.png" /></li>
                      <li><img src="./images/hiring/gallery2.png" /></li>
                      <li><img src="./images/hiring/gallery3.png" /></li>
                      <li><img src="./images/hiring/gallery4.png" /></li>
                    </ul>
                  </div>
                </div>

                <a id="flip" class="btn">Read More</a>

              </div>

            </div>

          </div>
        </section>




      </div>


    </div>

    <div class="full-screen hidden flex-container-center">
      <div class="rate-servicessss">
        <h2>Rate the service</h2>

        <div class="row-first">
          <div class="stars">

            <ion-icon class="star" id="star1" name="star-outline"></ion-icon>
            <ion-icon class="star" id="star2" name="star-outline"></ion-icon>
            <ion-icon class="star" id="star3" name="star-outline"></ion-icon>
            <ion-icon class="star" id="star4" name="star-outline"></ion-icon>
            <ion-icon class="star" id="star5" name="star-outline"></ion-icon>
          </div>
        </div>
        <h4>Your Feedback matter to us</h4>
        <textarea></textarea>
        <button onclick="closePopup()">Send</button>
      </div>

    </div>

  </section>




  <!-- footer start -->
  <footer id="footer-section">
    <div class="container">
      <div class="footer-widgets">
        <div class="row" style="padding: 60px 0px 30px 0px;">
          <div class="col-lg-3 mb-3 mb-lg-0">
            <img class="footerlogo" src="./images/footerlogo.png" width="100%" />
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://unpkg.com/ionicons@4.2.4/dist/ionicons.js"></script>
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
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
  <script src="plugins/google-map/gmap.js"></script>

  <!-- Main Script -->
  <script src="js/script.js"></script>

</body>

</html>

<script>
  $('.moreless-button').click(function () {
    $('.moretext').slideToggle();
    if ($('.moreless-button').text() == "View Less") {
      $(this).text("View Less")
    } else {
      $(this).text("View Less")
    }
  });
</script>

<script>
  const popup = document.querySelector('.full-screen');

  function showPopup() {
    popup.classList.remove('hidden');
  }

  function closePopup() {
    popup.classList.add('hidden');
  }

</script>
<script>
  window.addEventListener('load', e => {

    const stars = document.querySelectorAll('.star');

    stars.forEach((star, index) => {
      star.addEventListener('click', e => {
        for (let i = 0; i <= index; i++) {
          stars[i].setAttribute('name', 'star');
          stars[i].style.opacity = 1;
        }
        for (let i = index + 1; i < stars.length; i++) {
          stars[i].setAttribute('name', 'star-outline');
          stars[i].style.opacity = 0.6;
        }
      });
    });

  });

</script>
<!-- <script>
  //to change text
  $('a#flip').click(function () {

    $(this).toggleClass("active");
    $('.panel').toggleClass("hide");

    if ($(this).hasClass("active")) {
      $(this).text("Read Less");
    } else {
      $(this).text("Read More");
    }

  });
  //to show panel
  $(document).ready(function () {
    $("#flip").click(function () {
      $("#panel").slideToggle("slow");
    });
  });
</script> -->