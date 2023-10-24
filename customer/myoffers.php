<?php
session_start();

?>
<!DOCTYPE html>
<html lang="zxx" class="my-offer">

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

<body class="services-page">
  

    <header class="navigation fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="index.php"><img src="images/signup/sitelogo-singup.png" alt="Egen"></a>
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
              <li class="nav-item">
                <a class="nav-link" href="notifications.php">Notifications</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="myhirings.php">My Hirings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="provider.php">Provider</a>
              </li> 
            </ul>
          </div>
        </nav>
      </header>

<!-- Section start -->
<section id="my-offers-main">
<div class="container">
    <div class="row">
        <div class="main-text">
            <h1 style="color: black;">My Offers</h1>
            <p style="color: #70BE44;">Here are your past services you availed and hired!</p>
        </div>
    </div>
    <div class="myoffer-button-serv">
        <ul>
            <li><a href="#"><button style="background-color: #70BE44; font-family: Cairo;
                font-size: 30px;
                font-weight: 600;
                line-height: 56px;
                letter-spacing: 0em;
                text-align: left;
                color: #FFFFFF;
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
    <div class="row">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">All Offers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Pending offers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Replied Offers</a>
            </li>
            
        </ul><!-- Tab panes -->
        
        <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <!-- SECOND OFFER ONETIME START -->
               <div class="my-offers onetime" style="margin-bottom: 40px;">

                <!-- MY OFR PROFILE INFO START -->
                                   <div class="my-ofr-profl-info">
                
                                    <div class="row">
                                        <div class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                            <div class="prf-imgwithtext">
                                                <img src="./images/hiring/hiring1.png"/>
                                               <h2> David Johnson</h2>
                                               <p>Garden Maintenance</p>
                                            </div>
                                        </div>
                
                                        <div style="text-align: right;" class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                            <h5 class="pending"><span style="background-color: #70BE44;">Replied</span></h5>
                                            <h6 style="color: #72B763;">Offered On 22,August,2022</h6>
                                        </div>
                                    </div>
                
                                    <div class="row bio-myoffer onetimepayment repliedoffer" style="padding-top: 30px;">
                                        <div class="col-lg-6 mb-3 mb-lg-0">
                                            <h4 style="padding-bottom: 30px;">Counter Offer</h4>
                                            <p><em><img src="./images/providerselected/Snow Plow.png"/> Snow Removal</em><span>$300</span></p>
                                            <p><em><img src="./images/providerselected/Cover Up.png"/> Spring Cleanup</em><span>$300</span></p>
                                            <p><em><img src="./images/providerselected/Grass.png"/> Grass Cutting</em><span>$300</span></p>
                                            <div class="totalselected">
                                                <ul>
                                                <li><em><img src="./images/providerselected/total.png"/>Total Charges</em><span>$300</span></li></ul>
                                              </div>
                                        </div>
                                        <div class="col-lg-6 mb-3 mb-lg-0" style="padding-left: 30px;">
                                           
                                            <div class="custom-bookingtime">
                                                <h4 style="padding-bottom: 10px;">Counter Booking Timings</h4>
                                                <ul>
                                                    <li><em>29-June-2023 , MON</em><span>10 am -12 am</span></li>
                                                </ul>
                                            </div>
                                            <h4 style="padding-bottom: 30px;">Task Description</h4>
                                            <p class="onetimepara">I'm Stuck at Norway highway near Crown valley street, I 
                                                have to wash & tint my car as soon as possible because 
                                                of this extreme sunny weather. kindly come fast ASAP 
                                                I'm waiting for your service. </p>
                                        </div>
                                        <div class="row viewimages-onetime">
                                            <a href="#"><button>View All</button></a>
                                        </div>
                                    </div>
                
                
                                   </div>
                
                
                
                                </div>
            <!-- SECOND OFFER ONETIME END -->
            <!-- SECOND OFFER ONETIME START -->
            <div class="my-offers onetime" style="margin-bottom: 40px;">

                <!-- MY OFR PROFILE INFO START -->
                                   <div class="my-ofr-profl-info">
                
                                    <div class="row">
                                        <div class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                            <div class="prf-imgwithtext">
                                                <img src="./images/hiring/hiring1.png"/>
                                               <h2> David Johnson</h2>
                                               <p>Garden Maintenance</p>
                                            </div>
                                        </div>
                
                                        <div style="text-align: right;" class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                            <h5 class="pending"><span style="background-color: #70BE44;">Replied</span></h5>
                                            <h6 style="color: #72B763;">Offered On 22,August,2022</h6>
                                        </div>
                                    </div>
                
                                    <div class="row bio-myoffer onetimepayment repliedoffer" style="padding-top: 30px;">
                                        <div class="col-lg-6 mb-3 mb-lg-0">
                                            <h4 style="padding-bottom: 30px;">Counter Offer</h4>
                                            <p><em><img src="./images/providerselected/Snow Plow.png"/> Snow Removal</em><span>$300</span></p>
                                            <p><em><img src="./images/providerselected/Cover Up.png"/> Spring Cleanup</em><span>$300</span></p>
                                            <p><em><img src="./images/providerselected/Grass.png"/> Grass Cutting</em><span>$300</span></p>
                                            <div class="totalselected">
                                                <ul>
                                                <li><em><img src="./images/providerselected/total.png"/>Total Charges</em><span>$300</span></li></ul>
                                              </div>
                                        </div>
                                        <div class="col-lg-6 mb-3 mb-lg-0" style="padding-left: 30px;">
                                           
                                            <div class="custom-bookingtime">
                                                <h4 style="padding-bottom: 10px;">Counter Booking Timings</h4>
                                                <ul>
                                                    <li><em>29-June-2023 , MON</em><span>10 am -12 am</span></li>
                                                </ul>
                                            </div>
                                            <h4 style="padding-bottom: 30px;">Task Description</h4>
                                            <p class="onetimepara">I'm Stuck at Norway highway near Crown valley street, I 
                                                have to wash & tint my car as soon as possible because 
                                                of this extreme sunny weather. kindly come fast ASAP 
                                                I'm waiting for your service. </p>
                                        </div>
                                        <div class="row viewimages-onetime">
                                            <a href="#"><button>View All</button></a>
                                        </div>
                                    </div>
                
                
                                   </div>
                
                
                
                                </div>
            <!-- SECOND OFFER ONETIME END -->
          
                <div class="my-offers onetime" style="margin-bottom: 40px;">

                    <!-- MY OFR PROFILE INFO START -->
                                       <div class="my-ofr-profl-info">
                    
                                        <div class="row">
                                            <div class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                                <div class="prf-imgwithtext">
                                                    <img src="./images/hiring/hiring1.png"/>
                                                   <h2> David Johnson</h2>
                                                   <p>Garden Maintenance</p>
                                                </div>
                                            </div>
                    
                                            <div style="text-align: right;" class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                                <h5 class="pending"><span>Pending</span></h5>
                                                <h6 style="color: #72B763;">Offered On 22,August,2022</h6>
                                            </div>
                                        </div>
                    
                                        <div class="row bio-myoffer onetimepayment" style="padding-top: 30px;">
                                            <div class="col-lg-6 mb-3 mb-lg-0">
                                                <h4 style="padding-bottom: 30px;">Service Cost Offer</h4>
                                                <p><em><img src="./images/providerselected/Snow Plow.png"/> Snow Removal</em><span>$300</span></p>
                                                <p><em><img src="./images/providerselected/Cover Up.png"/> Spring Cleanup</em><span>$300</span></p>
                                                <p><em><img src="./images/providerselected/Grass.png"/> Grass Cutting</em><span>$300</span></p>
                                                <div class="totalselected">
                                                    <ul>
                                                    <li><em><img src="./images/providerselected/total.png"/>Total Charges</em><span>$300</span></li></ul>
                                                  </div>
                                            </div>
                                            <div class="col-lg-6 mb-3 mb-lg-0" style="padding-left: 30px;">
                                               
                                                <div class="custom-bookingtime">
                                                    <h4 style="padding-bottom: 10px;">Booking Time</h4>
                                                    <ul>
                                                        <li><em>29-June-2023 , MON</em><span>10 am -12 am</span></li>
                                                    </ul>
                                                </div>
                                                <h4 style="padding-bottom: 30px;">Task Description</h4>
                                                <p class="onetimepara">I'm Stuck at Norway highway near Crown valley street, I 
                                                    have to wash & tint my car as soon as possible because 
                                                    of this extreme sunny weather. kindly come fast ASAP 
                                                    I'm waiting for your service. </p>
                                            </div>
                                            <div class="row viewimages-onetime">
                                                <a href="#"><button>View Images</button></a>
                                            </div>
                                        </div>
                    
                    
                                       </div>
                    
                    
                    
                                    </div>
                                    <!-- MY OFR PROFILE INFO END -->
                                    <div class="my-offers onetime" style="margin-bottom: 40px;">

                                        <!-- MY OFR PROFILE INFO START -->
                                                           <div class="my-ofr-profl-info">
                                        
                                                            <div class="row">
                                                                <div class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                                                    <div class="prf-imgwithtext">
                                                                        <img src="./images/hiring/hiring1.png"/>
                                                                       <h2> David Johnson</h2>
                                                                       <p>Garden Maintenance</p>
                                                                    </div>
                                                                </div>
                                        
                                                                <div style="text-align: right;" class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                                                    <h5 class="pending"><span>Pending</span></h5>
                                                                    <h6 style="color: #72B763;">Offered On 22,August,2022</h6>
                                                                </div>
                                                            </div>
                                        
                                                            <div class="row bio-myoffer onetimepayment" style="padding-top: 30px;">
                                                                <div class="col-lg-6 mb-3 mb-lg-0">
                                                                    <h4 style="padding-bottom: 30px;">Service Cost Offer</h4>
                                                                    <p><em><img src="./images/providerselected/Snow Plow.png"/> Snow Removal</em><span>$300</span></p>
                                                                    <p><em><img src="./images/providerselected/Cover Up.png"/> Spring Cleanup</em><span>$300</span></p>
                                                                    <p><em><img src="./images/providerselected/Grass.png"/> Grass Cutting</em><span>$300</span></p>
                                                                    <div class="totalselected">
                                                                        <ul>
                                                                        <li><em><img src="./images/providerselected/total.png"/>Total Charges</em><span>$300</span></li></ul>
                                                                      </div>
                                                                </div>
                                                                <div class="col-lg-6 mb-3 mb-lg-0" style="padding-left: 30px;">
                                                                   
                                                                    <div class="custom-bookingtime">
                                                                        <h4 style="padding-bottom: 10px;">Booking Time</h4>
                                                                        <ul>
                                                                            <li><em>29-June-2023 , MON</em><span>10 am -12 am</span></li>
                                                                        </ul>
                                                                    </div>
                                                                    <h4 style="padding-bottom: 30px;">Task Description</h4>
                                                                    <p class="onetimepara">I'm Stuck at Norway highway near Crown valley street, I 
                                                                        have to wash & tint my car as soon as possible because 
                                                                        of this extreme sunny weather. kindly come fast ASAP 
                                                                        I'm waiting for your service. </p>
                                                                </div>
                                                                <div class="row viewimages-onetime">
                                                                    <a href="#"><button>View Images</button></a>
                                                                </div>
                                                            </div>
                                        
                                        
                                                           </div>
                                        
                                        
                                        
                                                        </div>
                                                        <!-- MY OFR PROFILE INFO END -->
            </div>
            <div class="tab-pane" id="tabs-2" role="tabpanel">
                <div class="my-offers onetime" style="margin-bottom: 40px;">

<!-- MY OFR PROFILE INFO START -->
                   <div class="my-ofr-profl-info">

                    <div class="row">
                        <div class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                            <div class="prf-imgwithtext">
                                <img src="./images/hiring/hiring1.png"/>
                               <h2> David Johnson</h2>
                               <p>Garden Maintenance</p>
                            </div>
                        </div>

                        <div style="text-align: right;" class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                            <h5 class="pending"><span>Pending</span></h5>
                            <h6 style="color: #72B763;">Offered On 22,August,2022</h6>
                        </div>
                    </div>

                    <div class="row bio-myoffer onetimepayment" style="padding-top: 30px;">
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <h4 style="padding-bottom: 30px;">Service Cost Offer</h4>
                            <p><em><img src="./images/providerselected/Snow Plow.png"/> Snow Removal</em><span>$300</span></p>
                            <p><em><img src="./images/providerselected/Cover Up.png"/> Spring Cleanup</em><span>$300</span></p>
                            <p><em><img src="./images/providerselected/Grass.png"/> Grass Cutting</em><span>$300</span></p>
                            <div class="totalselected">
                                <ul>
                                <li><em><img src="./images/providerselected/total.png"/>Total Charges</em><span>$300</span></li></ul>
                              </div>
                        </div>
                        <div class="col-lg-6 mb-3 mb-lg-0" style="padding-left: 30px;">
                           
                            <div class="custom-bookingtime">
                                <h4 style="padding-bottom: 10px;">Booking Time</h4>
                                <ul>
                                    <li><em>29-June-2023 , MON</em><span>10 am -12 am</span></li>
                                </ul>
                            </div>
                            <h4 style="padding-bottom: 30px;">Task Description</h4>
                            <p class="onetimepara">I'm Stuck at Norway highway near Crown valley street, I 
                                have to wash & tint my car as soon as possible because 
                                of this extreme sunny weather. kindly come fast ASAP 
                                I'm waiting for your service. </p>
                        </div>
                        <div class="row viewimages-onetime">
                            <a href="#"><button>View Images</button></a>
                        </div>
                    </div>


                   </div>



                </div>
                <!-- MY OFR PROFILE INFO END -->
                <!-- SECOND OFFER ONETIME START -->
                <div class="my-offers onetime" style="margin-bottom: 40px;">

                    <!-- MY OFR PROFILE INFO START -->
                                       <div class="my-ofr-profl-info">
                    
                                        <div class="row">
                                            <div class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                                <div class="prf-imgwithtext">
                                                    <img src="./images/hiring/hiring1.png"/>
                                                   <h2> David Johnson</h2>
                                                   <p>Garden Maintenance</p>
                                                </div>
                                            </div>
                    
                                            <div style="text-align: right;" class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                                <h5 class="pending"><span>Pending</span></h5>
                                                <h6 style="color: #72B763;">Offered On 22,August,2022</h6>
                                            </div>
                                        </div>
                    
                                        <div class="row bio-myoffer onetimepayment" style="padding-top: 30px;">
                                            <div class="col-lg-6 mb-3 mb-lg-0">
                                                <h4 style="padding-bottom: 30px;">Service Cost Offer</h4>
                                                <p><em><img src="./images/providerselected/Snow Plow.png"/> Snow Removal</em><span>$300</span></p>
                                                <p><em><img src="./images/providerselected/Cover Up.png"/> Spring Cleanup</em><span>$300</span></p>
                                                <p><em><img src="./images/providerselected/Grass.png"/> Grass Cutting</em><span>$300</span></p>
                                                <div class="totalselected">
                                                    <ul>
                                                    <li><em><img src="./images/providerselected/total.png"/>Total Charges</em><span>$300</span></li></ul>
                                                  </div>
                                            </div>
                                            <div class="col-lg-6 mb-3 mb-lg-0" style="padding-left: 30px;">
                                               
                                                <div class="custom-bookingtime">
                                                    <h4 style="padding-bottom: 10px;">Booking Time</h4>
                                                    <ul>
                                                        <li><em>29-June-2023 , MON</em><span>10 am -12 am</span></li>
                                                    </ul>
                                                </div>
                                                <h4 style="padding-bottom: 30px;">Task Description</h4>
                                                <p class="onetimepara">I'm Stuck at Norway highway near Crown valley street, I 
                                                    have to wash & tint my car as soon as possible because 
                                                    of this extreme sunny weather. kindly come fast ASAP 
                                                    I'm waiting for your service. </p>
                                            </div>
                                            <div class="row viewimages-onetime">
                                                <a href="#"><button>View Images</button></a>
                                            </div>
                                        </div>
                    
                    
                                       </div>
                    
                    
                    
                                    </div>
                <!-- SECOND OFFER ONETIME END -->
            </div>
            <div class="tab-pane" id="tabs-3" role="tabpanel">
                
               <!-- SECOND OFFER ONETIME START -->
               <div class="my-offers onetime" style="margin-bottom: 40px;">

                <!-- MY OFR PROFILE INFO START -->
                                   <div class="my-ofr-profl-info">
                
                                    <div class="row">
                                        <div class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                            <div class="prf-imgwithtext">
                                                <img src="./images/hiring/hiring1.png"/>
                                               <h2> David Johnson</h2>
                                               <p>Garden Maintenance</p>
                                            </div>
                                        </div>
                
                                        <div style="text-align: right;" class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                            <h5 class="pending"><span style="background-color: #70BE44;">Replied</span></h5>
                                            <h6 style="color: #72B763;">Offered On 22,August,2022</h6>
                                        </div>
                                    </div>
                
                                    <div class="row bio-myoffer onetimepayment repliedoffer" style="padding-top: 30px;">
                                        <div class="col-lg-6 mb-3 mb-lg-0">
                                            <h4 style="padding-bottom: 30px;">Counter Offer</h4>
                                            <p><em><img src="./images/providerselected/Snow Plow.png"/> Snow Removal</em><span>$300</span></p>
                                            <p><em><img src="./images/providerselected/Cover Up.png"/> Spring Cleanup</em><span>$300</span></p>
                                            <p><em><img src="./images/providerselected/Grass.png"/> Grass Cutting</em><span>$300</span></p>
                                            <div class="totalselected">
                                                <ul>
                                                <li><em><img src="./images/providerselected/total.png"/>Total Charges</em><span>$300</span></li></ul>
                                              </div>
                                        </div>
                                        <div class="col-lg-6 mb-3 mb-lg-0" style="padding-left: 30px;">
                                           
                                            <div class="custom-bookingtime">
                                                <h4 style="padding-bottom: 10px;">Counter Booking Timings</h4>
                                                <ul>
                                                    <li><em>29-June-2023 , MON</em><span>10 am -12 am</span></li>
                                                </ul>
                                            </div>
                                            <h4 style="padding-bottom: 30px;">Task Description</h4>
                                            <p class="onetimepara">I'm Stuck at Norway highway near Crown valley street, I 
                                                have to wash & tint my car as soon as possible because 
                                                of this extreme sunny weather. kindly come fast ASAP 
                                                I'm waiting for your service. </p>
                                        </div>
                                        <div class="row viewimages-onetime">
                                            <a href="#"><button>View All</button></a>
                                        </div>
                                    </div>
                
                
                                   </div>
                
                
                
                                </div>
            <!-- SECOND OFFER ONETIME END -->

            <!-- SECOND OFFER ONETIME START -->
            <div class="my-offers onetime" style="margin-bottom: 40px;">

                <!-- MY OFR PROFILE INFO START -->
                                   <div class="my-ofr-profl-info">
                
                                    <div class="row">
                                        <div class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                            <div class="prf-imgwithtext">
                                                <img src="./images/hiring/hiring1.png"/>
                                               <h2> David Johnson</h2>
                                               <p>Garden Maintenance</p>
                                            </div>
                                        </div>
                
                                        <div style="text-align: right;" class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                            <h5 class="pending"><span style="background-color: #70BE44;">Replied</span></h5>
                                            <h6 style="color: #72B763;">Offered On 22,August,2022</h6>
                                        </div>
                                    </div>
                
                                    <div class="row bio-myoffer onetimepayment repliedoffer" style="padding-top: 30px;">
                                        <div class="col-lg-6 mb-3 mb-lg-0">
                                            <h4 style="padding-bottom: 30px;">Counter Offer</h4>
                                            <p><em><img src="./images/providerselected/Snow Plow.png"/> Snow Removal</em><span>$300</span></p>
                                            <p><em><img src="./images/providerselected/Cover Up.png"/> Spring Cleanup</em><span>$300</span></p>
                                            <p><em><img src="./images/providerselected/Grass.png"/> Grass Cutting</em><span>$300</span></p>
                                            <div class="totalselected">
                                                <ul>
                                                <li><em><img src="./images/providerselected/total.png"/>Total Charges</em><span>$300</span></li></ul>
                                              </div>
                                        </div>
                                        <div class="col-lg-6 mb-3 mb-lg-0" style="padding-left: 30px;">
                                           
                                            <div class="custom-bookingtime">
                                                <h4 style="padding-bottom: 10px;">Counter Booking Timings</h4>
                                                <ul>
                                                    <li><em>29-June-2023 , MON</em><span>10 am -12 am</span></li>
                                                </ul>
                                            </div>
                                            <h4 style="padding-bottom: 30px;">Task Description</h4>
                                            <p class="onetimepara">I'm Stuck at Norway highway near Crown valley street, I 
                                                have to wash & tint my car as soon as possible because 
                                                of this extreme sunny weather. kindly come fast ASAP 
                                                I'm waiting for your service. </p>
                                        </div>
                                        <div class="row viewimages-onetime">
                                            <a href="#"><button>View All</button></a>
                                        </div>
                                    </div>
                
                
                                   </div>
                
                
                
                                </div>
            <!-- SECOND OFFER ONETIME END -->

            <!-- SECOND OFFER ONETIME START -->
            <div class="my-offers onetime" style="margin-bottom: 40px;">

                <!-- MY OFR PROFILE INFO START -->
                                   <div class="my-ofr-profl-info">
                
                                    <div class="row">
                                        <div class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                            <div class="prf-imgwithtext">
                                                <img src="./images/hiring/hiring1.png"/>
                                               <h2> David Johnson</h2>
                                               <p>Garden Maintenance</p>
                                            </div>
                                        </div>
                
                                        <div style="text-align: right;" class="col-lg-6 mb-3 mb-lg-0 align-self-center">
                                            <h5 class="pending"><span style="background-color: #70BE44;">Replied</span></h5>
                                            <h6 style="color: #72B763;">Offered On 22,August,2022</h6>
                                        </div>
                                    </div>
                
                                    <div class="row bio-myoffer onetimepayment repliedoffer" style="padding-top: 30px;">
                                        <div class="col-lg-6 mb-3 mb-lg-0">
                                            <h4 style="padding-bottom: 30px;">Counter Offer</h4>
                                            <p><em><img src="./images/providerselected/Snow Plow.png"/> Snow Removal</em><span>$300</span></p>
                                            <p><em><img src="./images/providerselected/Cover Up.png"/> Spring Cleanup</em><span>$300</span></p>
                                            <p><em><img src="./images/providerselected/Grass.png"/> Grass Cutting</em><span>$300</span></p>
                                            <div class="totalselected">
                                                <ul>
                                                <li><em><img src="./images/providerselected/total.png"/>Total Charges</em><span>$300</span></li></ul>
                                              </div>
                                        </div>
                                        <div class="col-lg-6 mb-3 mb-lg-0" style="padding-left: 30px;">
                                           
                                            <div class="custom-bookingtime">
                                                <h4 style="padding-bottom: 10px;">Counter Booking Timings</h4>
                                                <ul>
                                                    <li><em>29-June-2023 , MON</em><span>10 am -12 am</span></li>
                                                </ul>
                                            </div>
                                            <h4 style="padding-bottom: 30px;">Task Description</h4>
                                            <p class="onetimepara">I'm Stuck at Norway highway near Crown valley street, I 
                                                have to wash & tint my car as soon as possible because 
                                                of this extreme sunny weather. kindly come fast ASAP 
                                                I'm waiting for your service. </p>
                                        </div>
                                        <div class="row viewimages-onetime">
                                            <a href="#"><button>View All</button></a>
                                        </div>
                                    </div>
                
                
                                   </div>
                
                
                
                                </div>
            <!-- SECOND OFFER ONETIME END -->

            </div>
            
        </div>
    </div>
</div>
</section>


<!-- Start end -->



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

<!-- Main Script -->
<script src="js/script.js"></script>
</body>
</html>
