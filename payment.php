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
  <link rel="stylesheet" href="assets/plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="assets/plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="assets/plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="assets/plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="assets/plugins/card-slider/css/style.css">

  <!-- Main Stylesheet -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- Font Family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
  <!--Favicon-->
  <!-- FONT AWESOME -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

</head>

<body>


    
    <section class="container py-2" id="provider-booking-payment">
      <a href="index.php">
        <div class="payment-site-logo">
            <img src="./assets/images/signup/sitelogo-singup.png"/>
        </div>
      </a>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <form id="msform">
                <fieldset>
                            <div class="form-card">
                              <div class="row">
                                 <div class="col-lg-8 mb-9 mb-lg-0">
                                  <div id="plan-purchase" class="payment-heading">
                                    <h1>Plan Purchase Checkout</h1>
                                    <h2>Payment Details</h2>
                                    <label for="ccn">Cardholder Name:</label>
                                    <input id="ccn" type="text" placeholder="John Johnson">
                                    <label for="ccn">Credit Card Number:</label>
                                    <input id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" 
                                     autocomplete="cc-number" maxlength="16" placeholder="xxxx xxxx xxxx xxxx">

                                     <!-- EXP AND CVC ROW -->
                                  <div class="row">
                                    <div class="col-lg-6 mb-6 mb-lg-0">
                                      <label for="ccn">Exp Date</label>
                                            <input class="cc-expires" maxlength="4" name="credit-expires" pattern="\d*" placeholder="MM / YY" type="tel" />
                                    </div>

                                    <div class="col-lg-6 mb-6 mb-lg-0 ffa">
                                      <label for="ccn">CVC</label>
                                      <input class="cc-cvc" maxlength="3" name="credit-cvc" pattern="\d*" placeholder="CVC" type="tel" />
                                    </div>
                                  </div>
                                     <!-- EXP AND CVC ROW END -->
                                     <input name="phone" placeholder="Phone No." type="text22" />
                                  </div>
                                 </div>
                                 <div class="col-lg-4 mb-3 mb-lg-0">
                                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <div id="pay-ca" class="package-box">
                                          <div class="pack-img">
                                              <img src="./assets/images/becomesprovider/plimg02.png">
                                          </div>
                                          <div class="package-head">
                                              <h1>Basic Seller Package</h1>
                                              <p>Monthly</p>
                                          </div>
                                          <div class="pack-para">
                                              <ul>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                              </ul>
                                          </div>
                                          <div class="package-price">
                                            <h1>$ 4.99</h1>
                                          </div>
                                          <div class="package-btn">
                                            <a href="#">Subscribe</a>
                                          </div>
                                      </div>
                                      </div>
                                      <div class="carousel-item">
                                        <div id="pay-ca" class="package-box">
                                          <div class="pack-img">
                                              <img src="./assets/images/becomesprovider/plimg02.png">
                                          </div>
                                          <div class="package-head">
                                              <h1>Basic gold Package</h1>
                                              <p>Monthly</p>
                                          </div>
                                          <div class="pack-para">
                                              <ul>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                              </ul>
                                          </div>
                                          <div class="package-price">
                                            <h1>$ 4.99</h1>
                                          </div>
                                          <div class="package-btn">
                                            <a href="#">Subscribe</a>
                                          </div>
                                      </div>
                                      </div>
                                      <div class="carousel-item">
                                        <div id="pay-ca" class="package-box">
                                          <div class="pack-img">
                                              <img src="./assets/images/becomesprovider/plimg02.png">
                                          </div>
                                          <div class="package-head">
                                              <h1>Basic Seller Package</h1>
                                              <p>Monthly</p>
                                          </div>
                                          <div class="pack-para">
                                              <ul>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                                <li>
                                                  Lorem Ipsum is simply dummy text of the printing
                                                </li>
                                              </ul>
                                          </div>
                                          <div class="package-price">
                                            <h1>$ 4.99</h1>
                                          </div>
                                          <div class="package-btn">
                                            <a href="#">Subscribe</a>
                                          </div>
                                      </div>
                                      </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
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
    </section>

<!-- footer end -->
<script>
  $(".carousel").swipe({

swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

  if (direction == 'left') $(this).carousel('next');
  if (direction == 'right') $(this).carousel('prev');

},
allowPageScroll:"vertical"

});
</script>
<!-- jQuery -->
<script src="assets/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="assets/plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="assets/plugins/venobox/venobox.min.js"></script>
<!-- shuffle -->
<script src="assets/plugins/shuffle/shuffle.min.js"></script>
<!-- apear js -->
<script src="assets/plugins/counto/apear.js"></script>
<!-- counter -->
<script src="assets/plugins/counto/counTo.js"></script>
<!-- card slider -->
<script src="assets/plugins/card-slider/js/card-slider-min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="assets/plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="assets/js/script.js"></script>

</body>
</html>