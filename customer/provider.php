<?php
// Include your database connection script
include 'connection.php';

function getProviderServices($conn, $provider_id)
{
    // Sanitize the input to prevent SQL injection
    $provider_id = mysqli_real_escape_string($conn, $provider_id);

    // Retrieve provider services from the database using the provider ID
    $sql = "SELECT * FROM provider_services WHERE provider_id = '$provider_id'";
    $result = $conn->query($sql);

    $services = array();

    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $services[] = $row;
        }
    }

    return $services;
}

$provider_id = ""; // You need to get the provider ID from somewhere (e.g., query parameter)


// Function to get provider's working images by ID
function getProviderWorkingImages($conn, $provider_id)
{
    // Sanitize the input to prevent SQL injection
    $provider_id = mysqli_real_escape_string($conn, $provider_id);

    // Retrieve working images for the provider from the 'working_images' table
    $sql = "SELECT * FROM provider_images WHERE provider_id = '$provider_id'";
    $result = $conn->query($sql);

    $images = array();

    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         $images[] = $row['image_path'];
    //     }
    // }

    return $images;
}
// Function to get provider details by ID
function getProviderDetails($conn, $provider_id)
{
    // Sanitize the input to prevent SQL injection
    $provider_id = mysqli_real_escape_string($conn, $provider_id);

    // Retrieve provider details from the database using the ID
    $sql = "SELECT * FROM provider_registration WHERE id = '$provider_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}
// Initialize variables
$fullname = "";
$country = "";
$city = "";
$address = "";
$profile_picture = "";
$working_timings_from = "";
$workingImages = array();

// Check if 'id' query parameter is set (provider_registration table ID)
if (isset($_GET['id'])) {
  $provider_id = $_GET['id'];
  $providerServices = getProviderServices($conn, $provider_id);

  // Now, $providerServices contains an array of provider services for the given provider ID.
  // You can loop through $providerServices to display the data or use it as needed.
  foreach ($providerServices as $service) {
      $working_timings_from = $service['working_timings_from'];
      $working_timings_to = $service['working_timings_to'];
      $shop_working_day_to = $service['shop_working_day_to'];
      // Split the services data by comma and store in an array
      $servicesArray = explode(',', $service['services']);
      // Trim each service to remove leading/trailing spaces
      $servicesArray = array_map('trim', $servicesArray);
      $commercial_services = $service['commercial_services'];
      $workingImages = getProviderWorkingImages($conn, $service['id']);
      // $fullname = $service['fullname'];
      // $serviceDescription = $service['service_description'];
      
      // Display or process the service data as needed
      // echo "<h2>Service Name: $working_timings_to</h2>";
      // echo "<p>Service Description: $serviceDescription</p>";
  }
}
// Check if 'id' query parameter is set
if (isset($_GET['id'])) {
  $provider_id = $_GET['id'];
  $providerDetails = getProviderDetails($conn, $provider_id);

  if ($providerDetails) {
      $fullname = $providerDetails['fullname'];
      $country = $providerDetails['country'];
      $city = $providerDetails['city'];
      $address = $providerDetails['address'];
      $profile_picture = $providerDetails['profile_picture'];

      // Retrieve provider's working images
      $workingImages = getProviderWorkingImages($conn, $provider_id);
  }
}

function getServicePrices($conn, $servicesArray) {
  $prices = array();

  foreach ($servicesArray as $individualService) {
      $serviceName = mysqli_real_escape_string($conn, $individualService);

      $sql = "SELECT price FROM categories WHERE heading = '$serviceName'";
echo "SQL Query: $sql"; // Debugging line
$result = $conn->query($sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}

$row = $result->fetch_assoc();
$price = $row['price'];

if ($price === 'N/A') {
    echo "Price not found for service: $serviceName";
} else {
    echo "Price for $serviceName: $price";
}

$result = $conn->query($sql);
if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}


  }

  return $prices;
}

// Call this function to get service prices
$servicePrices = getServicePrices($conn, $servicesArray);

?>
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
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
    rel="stylesheet">
  <!--Favicon-->
  <!-- FONT AWESOME -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body class="services-page">


  <?php include('header.php'); ?>

  <!-- banner -->
  <section id="main-banner" class="banner bg-cover position-relative d-flex justify-content-center align-items-center"
    data-background="images/banner/banner.png" style="text-align: center;     min-height: 50vh;">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 style="color: #FFF; padding-top: 120px;">Provider</h2>
          <h5 style="color: white;">Here are your daily updates Notifications</h5>
        </div>
      </div>


    </div>
  </section>
  <!-- /banner -->

  <!-- PROVIDER SEC START -->
  <section id="provider-booking-payment">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card px-0 pt-4 pb-0 mt-3 mb-3">

            <form id="msform">
              <!-- progressbar -->
              <ul id="progressbar">
                <li class="active" id="account"><strong>Provider Selected</strong></li>
                <li id="personal"><strong>Set Booking</strong></li>
                <li id="payment"><strong>Your Offer</strong></li>
              </ul>
              <br>

              <!-- fieldsets -->

              <fieldset class="my-first-field">
                <!-- ROW PROVIDER selected START -->
                <div class="provider-selected-main">

                  <div class="row provider-gradedetails">
                    <div class="col-lg-3 col-sm-12 align-self-center">
                      <div class="provider-name">
                        <img src="../provider/<?php echo $profile_picture ?>" />
                        <h4><?php echo $fullname; ?></h4>
                      </div>
                    </div>
                    <div class="col-lg-5 col-sm-12 align-self-center">
                      <ul class="grade" style="width: 100%;">
                        <li><i style="color: #FFC400;" class="fa fa-star" aria-hidden="true"></i> 4.9</li>
                        <li>100%</li>
                        <li>Job Success</li>
                      </ul>
                    </div>
                    <div class="col-lg-1 col-sm-12 align-self-center">

                    </div>
                    <div class="col-lg-3 col-sm-12 align-self-center">
                      <h6 style="color: #70BE44;" class="price">$30/hr</h6>
                    </div>
                    <ul class="detaillist" style="width: 100%;">
                      <li><i style="color: #70BE44" class="fa fa-check" aria-hidden="true"></i> 50+ Completed task</li>
                      <li><i style="color: #70BE44" class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $city ?>, <?php echo $address ?></li>
                      <li><i style="color: #70BE44;" class="fa fa-clock" aria-hidden="true"></i> Available hour <?php echo $working_timings_from ?> -
                        <?php echo $working_timings_to ?> </li>
                    </ul>
                    <div class="about-provider">
                      <h4 style="width: 100%;">About me</h4>
                      <p style="width: 100%;">I have 10+ years experience in vehicle mechanics and have my own
                        equipment, I would <br>
                        love to help you get your job done and satisfied reviews.
                      </p>
                      <h4 style="width: 100%;"><a href="#">Read More</a></h4>
                    </div>
                  </div>

                  <div class="row" style="padding: 40px 0px;">
                    <div class="col-lg-6 col-sm-12">
                      <div class="gallerinfo">
                        <h5>Work Done Gallery</h5>
                        <ul style="width: 100%;">
                          <?php
                          // $imageHtml = '';
foreach ($workingImages as $imagePath) {
    echo  "<img src='$imagePath' />";
}
                          ?>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                      <div class="speciality-info">
                        <h5>Specialities</h5>
                        <!-- <ul class="specialitylist" style="width: 100%;">
                                            <li><img src="./images/providerselected/Snow Plow.png"/> Removal</li>
                                            <li><img src="./images/providerselected/Grass.png"/> Grass Cutting</li>
                                            <li><img src="./images/providerselected/Cover Up.png"/> Spring Cleanup</li>
                                        </ul> -->
                        <!-- <div class="row"> -->
                        <ul class='specialitylist' style='width: 100%;'>
                        <?php

                        foreach ($servicesArray as $individualService) {
                          echo " <li><img src='./images/providerselected/Snow Plow.png'/>$individualService</li>";
                        }

                          ?>
                          </ul>
                        <!-- </div> -->

                        <ul class="specialitylist" style="width: 100%;">
                          
                          <!-- <li><img src="./images/providerselected/Grass.png" /> Grass Cutting</li> -->
                          <!-- <li><img src="./images/providerselected/Cover Up.png" /> Spring Cleanup</li> -->
                        </ul>
                      </div>
                    </div>

                  </div>

                  <div class="row" style="width: 100%;">
                    <div class="col-lg-6 col-sm-12">
                      <div class="recent-jobs-inner">
                        <div class="row">
                          <div class="col-lg-6 col-sm-12">
                            <div class="data-recent">
                              <h3><img src="./images/providerselected/recent1.png" /> Alexendar Leo</h3>
                            </div>
                          </div>

                          <div class="col-lg-6 col-sm-12">
                            <div class="data-recent-grades">
                              <ul>
                                <li style="color: #FFC400;"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li style="color: #FFC400;"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li style="color: #FFC400;"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li style="color: #FFC400;"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li style="color: #FFC400;"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li style="font-size: 14px;
                                                line-height: 19px; color: #BEBEBE;">Sep 4, 2021 </li>
                              </ul>
                            </div>
                          </div>

                        </div>

                        <p>Had an amazing experience and problem solver this men is...Thumbs up.</p>
                        <div class="services-provided">
                          <h6><em>SERVICE PROVIDED</em> <span>grass cutting , lawn mowing , snow cleanup.</span></h6>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 col-sm-12">
                      <div class="recent-jobs-inner">
                        <div class="row">
                          <div class="col-lg-6 col-sm-12">
                            <div class="data-recent">
                              <h3><img src="./images/providerselected/recent1.png" /> Alexendar Leo</h3>
                            </div>
                          </div>

                          <div class="col-lg-6 col-sm-12">
                            <div class="data-recent-grades">
                              <ul>
                                <li style="color: #FFC400;"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li style="color: #FFC400;"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li style="color: #FFC400;"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li style="color: #FFC400;"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li style="color: #FFC400;"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li style="font-size: 14px;
                                            line-height: 19px; color: #BEBEBE;">Sep 4, 2021 </li>
                              </ul>
                            </div>
                          </div>

                        </div>

                        <p>Had an amazing experience and problem solver this men is...Thumbs up.</p>
                        <div class="services-provided">
                          <h6><em>SERVICE PROVIDED</em> <span>grass cutting , lawn mowing , snow cleanup.</span></h6>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                <input type="button" name="next" class="next action-button" value="Book now" />
                <!-- ROW PROVIDER selected end -->

              </fieldset>

              <!-- PROVIDER END -->

              <!-- second FIELDSET START -->
              <fieldset>
                <div class="row booking-section" style="width: 100%;">
                  <h3 style="width: 100%;">Select Services & Set Your Booking</h3>
                  <div class="select-service-booking">
                    <h4>Select Services you need</h4>
                    <div class="row">
                    <?php

                  foreach ($servicesArray as $individualService) {
                    echo "<div class='col-lg-3 mb-3 mb-lg-0'>";
                    echo "<label><input type='checkbox' name='checkbox' value='value'>$individualService</label>";
                    echo "</div>";
                  }

                    ?>
                      <!-- <div class="col-lg-3 mb-3 mb-lg-0">
                        <label><input type="checkbox" name="checkbox" value="value">Gardening</label>
                      </div>
                      <div class="col-lg-3 mb-3 mb-lg-0">
                        <label><input type="checkbox" name="checkbox" value="value">Land Clearing</label>
                      </div>
                      <div class="col-lg-3 mb-3 mb-lg-0">
                        <label><input type="checkbox" name="checkbox" value="value">Lawn Mowing</label>
                      </div>
                      <div class="col-lg-3 mb-3 mb-lg-0">
                        <label><input type="checkbox" name="checkbox" value="value">Grass Trimming</label>
                      </div> -->
                    </div>
                    <!-- <div class="row">
                      <div class="col-lg-3 mb-3 mb-lg-0">
                        <label><input type="checkbox" name="checkbox" value="value">Tree Planting</label>
                      </div>
                      <div class="col-lg-3 mb-3 mb-lg-0">
                        <label><input type="checkbox" name="checkbox" value="value">Weeding</label>
                      </div>
                      <div class="col-lg-3 mb-3 mb-lg-0">
                        <label><input type="checkbox" name="checkbox" value="value">Snow removal</label>
                      </div>
                      <div class="col-lg-3 mb-3 mb-lg-0">
                        <label><input type="checkbox" name="checkbox" value="value">Snow removal</label>
                      </div>
                    </div> -->
                  </div>

                  <div class="upload-field-booking">
                    <h2>Upload Images of your Place</h2>
                    <label style="background-image: url(./images/providerselected/upload.PNG);">
                      <input type="file" name="File Upload" value="value" multiple max="5"></label>
                    <p style="text-align: left;">Minimum 5 images of Of your service area , make sure image should be
                      clear</p>
                  </div>

                  <div class="advancebook-bookingtab">
                    <div class="col-lg-9 mb-9 mb-lg-0">
                      <h2>Want Advance Booking for this Services</h2>
                    </div>
                    <div class="col-lg-3 mb-3 mb-lg-0">
                      <div class="toggle-button-cover">
                        <div class="button-cover">
                          <div class="button r" id="button-1">
                            <input type="checkbox" class="checkbox" />
                            <div class="knobs"></div>
                            <div class="layer"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div id='main'>
                    <h3>Choose Your Time & Date </h3>
                    <div id='app'></div>
                  </div>
                  <div class="booked-hours">
                    <h4>Already Booked hours</h4>
                    <div class="row">
                      <div class="col-lg-4 mb-4 mb-lg-0">
                        <a href="#">
                          <button class="green">6PM -9 PM</button>
                        </a>
                      </div>
                      <div class="col-lg-4 mb-4 mb-lg-0">
                        <a href="#">
                          <button class="orange">10 AM -12 PM</button>
                        </a>
                      </div>
                      <div class="col-lg-4 mb-4 mb-lg-0">
                        <a href="#">
                          <button class="blue">2PM-4PM</button>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="text-header">
                    <h4>Set Time</h4>

                  </div>
                  <div class="time-selection">
                    <div class="hours-slots">
                      <ul id="custom-timeslot">
                        <li>
                          <p>01</p>
                        </li>
                        <li>
                          <p>02</p>
                        </li>
                        <li>
                          <p>03</p>
                        </li>
                        <li>
                          <p>04</p>
                        </li>
                        <li>
                          <p>05</p>
                        </li>
                        <li>
                          <p>06</p>
                        </li>
                        <li>
                          <p>07</p>
                        </li>
                        <li>
                          <p>08</p>
                        </li>
                        <li>
                          <p>09</p>
                        </li>
                        <li>
                          <p>10</p>
                        </li>
                        <li>
                          <p>11</p>
                        </li>
                        <li>
                          <p>12</p>
                        </li>
                      </ul>
                    </div>

                    <div class="ratio-time">:</div>
                    <div class="hours-slots">

                      <ul id="custom-timeslot1">
                        <li>
                          <p>00</p>
                        </li>
                        <li>
                          <p>01</p>
                        </li>
                        <li>
                          <p>02</p>
                        </li>
                        <li>
                          <p>03</p>
                        </li>
                        <li>
                          <p>04</p>
                        </li>
                        <li>
                          <p>05</p>
                        </li>
                        <li>
                          <p>06</p>
                        </li>
                        <li>
                          <p>07</p>
                        </li>
                        <li>
                          <p>08</p>
                        </li>
                        <li>
                          <p>09</p>
                        </li>
                        <li>
                          <p>10</p>
                        </li>
                        <li>
                          <p>11</p>
                        </li>
                        <li>
                          <p>12</p>
                        </li>
                        <li>
                          <p>13</p>
                        </li>
                        <li>
                          <p>14</p>
                        </li>
                        <li>
                          <p>15</p>
                        </li>
                        <li>
                          <p>16</p>
                        </li>
                        <li>
                          <p>17</p>
                        </li>
                        <li>
                          <p>18</p>
                        </li>
                        <li>
                          <p>19</p>
                        </li>
                        <li>
                          <p>20</p>
                        </li>
                        <li>
                          <p>21</p>
                        </li>
                        <li>
                          <p>22</p>
                        </li>
                        <li>
                          <p>23</p>
                        </li>
                        <li>
                          <p>24</p>
                        </li>
                        <li>
                          <p>25</p>
                        </li>
                        <li>
                          <p>26</p>
                        </li>
                        <li>
                          <p>27</p>
                        </li>
                        <li>
                          <p>28</p>
                        </li>
                        <li>
                          <p>29</p>
                        </li>
                        <li>
                          <p>30</p>
                        </li>
                        <li>
                          <p>31</p>
                        </li>
                        <li>
                          <p>32</p>
                        </li>
                        <li>
                          <p>33</p>
                        </li>
                        <li>
                          <p>34</p>
                        </li>
                        <li>
                          <p>35</p>
                        </li>
                        <li>
                          <p>36</p>
                        </li>
                        <li>
                          <p>37</p>
                        </li>
                        <li>
                          <p>38</p>
                        </li>
                        <li>
                          <p>39</p>
                        </li>
                        <li>
                          <p>40</p>
                        </li>
                        <li>
                          <p>41</p>
                        </li>
                        <li>
                          <p>42</p>
                        </li>
                        <li>
                          <p>43</p>
                        </li>
                        <li>
                          <p>44</p>
                        </li>
                        <li>
                          <p>45</p>
                        </li>
                        <li>
                          <p>46</p>
                        </li>
                        <li>
                          <p>47</p>
                        </li>
                        <li>
                          <p>48</p>
                        </li>
                        <li>
                          <p>49</p>
                        </li>
                        <li>
                          <p>50</p>
                        </li>
                        <li>
                          <p>51</p>
                        </li>
                        <li>
                          <p>52</p>
                        </li>
                        <li>
                          <p>53</p>
                        </li>
                        <li>
                          <p>54</p>
                        </li>
                        <li>
                          <p>55</p>
                        </li>
                        <li>
                          <p>56</p>
                        </li>
                        <li>
                          <p>57</p>
                        </li>
                        <li>
                          <p>58</p>
                        </li>
                        <li>
                          <p>59</p>
                        </li>
                      </ul>
                    </div>

                    <div class="hours-slots">
                      <ul id="custom-timeslot2">
                        <li>
                          <p>AM</p>
                        </li>
                        <li>
                          <p>PM</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="shortmessage">
                    <h4>Task Description</h4>
                    <textarea placeholder="Give your Note to the worker"></textarea>
                  </div>
                </div>
                <input type="button" name="next" class="next action-button" value="Continue" />
                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
              </fieldset>
              <!-- THIRD FEILD END -->

              <fieldset>
                <div class="your-offer-selected">
                  <div class="row">
                  <div class="col-lg-6 mb-3 mb-lg-0">
    <h2>Your offers for services selected</h2>
    <div class="unorderlist-selected">
        <?php
        foreach ($servicesArray as $individualService) {
          $price = isset($servicePrices[$individualService]) ? $servicePrices[$individualService] : $price = 'N/A';
          echo "<li><em><img src='./images/providerselected/Snow Plow.png' />$individualService</em><span>$" . $price . "</span></li>";
        }
        ?>
    </div>
    <div class="totalselected">
        <li><em><img src="./images/providerselected/total.png" />Total Charges</em><span>$300</span></li>
    </div>
</div>

                    <div class="col-lg-6 mb-3 mb-lg-0">
                      <div class="selected-prfle-detl">
                        <div class="order-details-checkout">
                          <div class="text-order-image">
                            <img src="./images/hiring/hiring1.png" />
                            <h2>David Johnson <br> <span>Lawn Mower</span></h2>

                          </div>
                          <ul class="order-details-minor" style="width: 100%;">
                            <h4>Booking Timing</h4>
                            <li><i style="color: #70BE44;" class="fa fa-clock" aria-hidden="true"></i>
                              21, August,4:00 AM, SUN </li>
                          </ul>
                          <div class="pricedetails1">
                            <h4>Services Selected</h4>
                            <ul>
                              <li><em>Lawn mowing</em> <span style="color: #70BE44;">$ 100.00</span></li>
                              <li><em>Snow Removal</em> <span style="color: #70BE44;">$ 100.00</span></li>
                              <li><em>Grass Cutting</em> <span style="color: #70BE44;">$ 100.00</span></li>
                            </ul>
                          </div>
                          <div class="taskdes-checkout">
                            <h4>Task Description</h4>
                            <p>I'm Stuck at Norway highway near Crown valley street, I have to
                              wash & tint my car as soon as possible because of this extreme
                              sunny weather. kindly come fast ASAP I'm waiting for you service.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <input type="button" name="next" class="submit next action-button"
                  value="Proceed & Send Request to Provider" />
                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
              </fieldset>
              <fieldset>
                <div class="your-offer-selected popup-selected">
                  <div class="popup-selected-modal">
                    <div class="popupsucessfully">
                      <img src="./images/checktick.png" />
                      <p>Your Offer Has been successfully sent to service provider</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                      <h2>Your offers for services selected</h2>
                      <div class="unorderlist-selected">
                        <li><em><img src="./images/providerselected/Snow Plow.png" />Snow
                            Removal</em><span>$100.00</span></li>
                        <li><em><img src="./images/providerselected/Cover Up.png" />Spring
                            Cleanup</em><span>$100.00</span></li>
                        <li><em><img src="./images/providerselected/Grass.png" />Grass Cutting</em><span>$100.00</span>
                        </li>
                      </div>
                      <div class="totalselected">
                        <li><em><img src="./images/providerselected/total.png" />Total Charges</em><span>$300</span>
                        </li>
                      </div>
                    </div>
                    <div class="col-lg-6 mb-3 mb-lg-0">
                      <div class="selected-prfle-detl">
                        <div class="order-details-checkout">
                          <div class="text-order-image">
                            <img src="./images/hiring/hiring1.png" />
                            <h2>David Johnson <br> <span>Lawn Mower</span></h2>

                          </div>
                          <ul class="order-details-minor" style="width: 100%;">
                            <h4>Booking Timing</h4>
                            <li><i style="color: #70BE44;" class="fa fa-clock" aria-hidden="true"></i>
                              21, August,4:00 AM, SUN </li>
                          </ul>
                          <div class="pricedetails1">
                            <h4>Services Selected</h4>
                            <ul>
                              <li><em>Lawn mowing</em> <span style="color: #70BE44;">$ 100.00</span></li>
                              <li><em>Snow Removal</em> <span style="color: #70BE44;">$ 100.00</span></li>
                              <li><em>Grass Cutting</em> <span style="color: #70BE44;">$ 100.00</span></li>
                            </ul>
                          </div>
                          <div class="taskdes-checkout">
                            <h4>Task Description</h4>
                            <p>I'm Stuck at Norway highway near Crown valley street, I have to
                              wash & tint my car as soon as possible because of this extreme
                              sunny weather. kindly come fast ASAP I'm waiting for you service.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PROVIDER SEC END -->

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
  <script src="plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <!-- slick slider -->
  <script src="plugins/slick/slick.min.js"></script>

  <!-- Main Script -->
  <script src="js/script.js"></script>
</body>

</html>

<script>
  $(document).ready(function () {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    $(".next").click(function () {

      current_fs = $(this).parent();
      next_fs = $(this).parent().next();

      //Add Class Active
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      //show the next fieldset
      next_fs.show();
      //hide the current fieldset with style
      current_fs.animate({ opacity: 0 }, {
        step: function (now) {
          // for making fielset appear animation
          opacity = 1 - now;

          current_fs.css({
            'display': 'none',
            'position': 'relative'
          });
          next_fs.css({ 'opacity': opacity });
        },
        duration: 500
      });
      setProgressBar(++current);
    });

    $(".previous").click(function () {

      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();

      //Remove class active
      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

      //show the previous fieldset
      previous_fs.show();

      //hide the current fieldset with style
      current_fs.animate({ opacity: 0 }, {
        step: function (now) {
          // for making fielset appear animation
          opacity = 1 - now;

          current_fs.css({
            'display': 'none',
            'position': 'relative'
          });
          previous_fs.css({ 'opacity': opacity });
        },
        duration: 500
      });
      setProgressBar(--current);
    });

    function setProgressBar(curStep) {
      var percent = parseFloat(100 / steps) * curStep;
      percent = percent.toFixed();
      $(".progress-bar")
        .css("width", percent + "%")
    }

    $(".submit").click(function () {
      return false;
    })

  });
</script>