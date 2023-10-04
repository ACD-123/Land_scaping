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
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Aaron Burks  </title>
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
            <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">Dwayne!</span></h1>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <a href="dashboard.php"><img class="hmesec" src="./images/home.PNG"/></a>
          </li>
          <li><a class="location-buton" href="#"><button><i class="menu-icon mdi mdi-map-marker"></i> Texas, USA Street 2416 A-216</button></a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
     <li class="nav-item dropdown d-none d-lg-block user-dropdown">
      <div class="text-profile">
        <div class="profiletext-imagesec">
        <h2>Dwayne Johnson</h2>
        <p>ID#214</p>
      </div>
        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> </a>
      </div>
            
            <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">Dwayne!</p>
                <p class="fw-light text-muted mb-0">Dwayne@gmail.com</p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div> -->
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
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
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="mdi mdi-view-dashboard menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="order-in-progress.php">
              <i class="menu-icon mdi mdi-format-list-bulleted"></i>
              <span class="menu-title">In Progress Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="schedule-order.php">
              <i class="menu-icon mdi mdi-calendar"></i>
              <span class="menu-title">Scheduled Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="complete-orders.php">
              <i class="menu-icon mdi mdi-file-document-box"></i>
              <span class="menu-title">Completed Orders</span>

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="new-offers.php">
              <i class="menu-icon mdi mdi-label-outline"></i>
              <span class="menu-title">New Offers</span>

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="chats.php">
              <i class="menu-icon mdi mdi-chat"></i>
              <span class="menu-title">Chats</span>

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="replied-offers.php">
              <i class="menu-icon mdi mdi-account-check"></i>
              <span class="menu-title">Replied Offers</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="rating-reviews.php">
              <i class="menu-icon mdi mdi-star-outline"></i>
              <span class="menu-title">Ratings & Reviews</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="service-settings.php">
              <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Service Settings</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profilesetting.php">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">Profile Settings</span>
            </a>
          </li>
          <li class="nav-item earning">
            <a class="nav-link" href="earning-withdraws.php">
              <i class="menu-icon mdi mdi-account-card-details"></i>
              <span class="menu-title">Earning & Withdrawals </span>
            </a>
          </li>

          <li class="nav-item signup">
            <a class="nav-link" href="#">
              
              <span class="menu-title">Signout</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <!-- START ROW MAIN-PANEL -->
        <div class="row rating-reviews-mainrow">
          <div class="order-in-progress">
            <h1><b style="color: #70BE44;">Replied </b>Offers</h1>

            <!-- MAIN- RATING DIV START -->
            <div class="rating-reviews">
                <h2 class="main-heading">Ratings Stats</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="rating1">
                            <p>Positive Reviews</p>
                            <h2><img src="./images/ratingstar.png"/> 4.5</h2>
                            <p>Based On 10 Ratings</p>
                            <div class="progress">
                                <h5>5 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                 
                                </div>
                              </div>
                              <div class="progress">
                                <h5>4 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                              
                                </div>
                              </div>
                              <div class="progress">
                                <h5>3 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                           
                                </div>
                              </div>
                              <div class="progress">
                                <h5>2 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                 
                                </div>
                              </div>
                              <div class="progress">
                                <h5>1 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                            
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rating1">
                            <p>Positive Reviews</p>
                            <h2>90%</h2>
                            <p>Based On 10 Ratings</p>
                            <div class="progress">
                                <h5>5 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                 
                                </div>
                              </div>
                              <div class="progress">
                                <h5>4 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                              
                                </div>
                              </div>
                              <div class="progress">
                                <h5>3 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                           
                                </div>
                              </div>
                              <div class="progress">
                                <h5>2 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                 
                                </div>
                              </div>
                              <div class="progress">
                                <h5>1 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                            
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rating1">
                            <p>Positive Reviews</p>
                            <h2>90%</h2>
                            <p>Based On 10 Ratings</p>
                            <div class="progress">
                                <h5>5 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                 
                                </div>
                              </div>
                              <div class="progress">
                                <h5>4 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                              
                                </div>
                              </div>
                              <div class="progress">
                                <h5>3 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                           
                                </div>
                              </div>
                              <div class="progress">
                                <h5>2 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                 
                                </div>
                              </div>
                              <div class="progress">
                                <h5>1 Stars</h5>
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                            
                                </div>
                              </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="main-heading-rating">
                        <h2>Recent Reviews</h2>
                    </div>
                    </div>
                    <div class="col-md-9">
                        <hr style="margin-top: 20px;">
                    </div>
                </div>

                <div class="reviews-customer-list">
                    <div class="row">
                        <div class="col-md-4">
                        <div class="reviews-profile">
                            <img src="./images/profileman.png"/>
                            <h2>Alexendar Leo</h2>
                        </div>
                    </div>
                    <div class="col-md-4"></div>

                    <div class="col-md-4" style="text-align: right;">
                        <div class="star-section">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                          </div>
                          <p>Sep 4, 2021 </p>
                        </div>
                    </div>
                    <h6>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                        and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h6>
                        <div class="reviews-category">
                            <ul>
                            <li><em>Service Provided</em><span style="color: #70BE44;">grass cutting , lawn mowing , snow cleanup . </span></li></ul>
                        </div>
                    </div>
            </div>
            <div class="reviews-customer-list" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-md-4">
                    <div class="reviews-profile">
                        <img src="./images/profileman.png"/>
                        <h2>Alexendar Leo</h2>
                    </div>
                </div>
                <div class="col-md-4"></div>

                <div class="col-md-4" style="text-align: right;">
                    <div class="star-section">
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                      </div>
                      <p>Sep 4, 2021 </p>
                    </div>
                </div>
                <h6>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h6>
                    <div class="reviews-category">
                        <ul>
                        <li><em>Service Provided</em><span style="color: #70BE44;">grass cutting , lawn mowing , snow cleanup . </span></li></ul>
                    </div>
                </div>
        </div>
        <div class="reviews-customer-list" style="margin-top: 20px;">
            <div class="row">
                <div class="col-md-4">
                <div class="reviews-profile">
                    <img src="./images/profileman.png"/>
                    <h2>Alexendar Leo</h2>
                </div>
            </div>
            <div class="col-md-4"></div>

            <div class="col-md-4" style="text-align: right;">
                <div class="star-section">
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                  </div>
                  <p>Sep 4, 2021 </p>
                </div>
            </div>
            <h6>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h6>
                <div class="reviews-category">
                    <ul>
                    <li><em>Service Provided</em><span style="color: #70BE44;">grass cutting , lawn mowing , snow cleanup . </span></li></ul>
                </div>
            </div>
    </div>
            <!-- MAIN RATING DIV END -->

</div>
            <!-- END ROW MAIN-PANEL -->
        </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
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
