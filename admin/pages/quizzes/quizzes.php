<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>InfoLAND | Online Learning Platform</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/tabicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.php -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../../index.php"><img src="../../assets/images/logo.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../assets/images/logo-mini.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../../admin_profile/<?php if (isset($_SESSION['admin'])) echo $_SESSION['admin']['profile']; ?>" 
                    alt="profile">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php if (isset($_SESSION['admin'])) echo $_SESSION['admin']['uname']; ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a id="sign-out" class="dropdown-item" href="quizzes.php"><i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="../../index.php" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../admin_profile/<?php if (isset($_SESSION['admin'])) echo $_SESSION['admin']['profile']; ?>" 
                    alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php if (isset($_SESSION['admin'])) echo $_SESSION['admin']['uname']; ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../sale_records/sale_records.php">
                <span class="menu-title">Sale Records</span>
                <i class="mdi mdi-square-inc-cash menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#course_crud" aria-expanded="false" aria-controls="course_crud">
                <span class="menu-title">Course Management</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="course_crud">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../course/course_view.php">View Courses</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../course/course_add.php">Add Courses</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../students/students.php">
                <span class="menu-title">Students Management</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../certificate/certificate.php">
                <span class="menu-title">Certificate Management</span>
                <i class="mdi mdi-certificate menu-icon"></i>
              </a>
            </li>            
            <li class="nav-item">
              <a class="nav-link" href="../comments/comments.php">
                <span class="menu-title">Comments Management</span>
                <i class="mdi mdi-comment menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../contact_us/contact_us.php">
                <span class="menu-title">Contacts Management</span>
                <i class="mdi mdi-contact-mail menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Quizzes </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="../course/course_view.php">Courses</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Quizzes</li>
                </ol>
              </nav>
            </div>   
            <div class="row">
              <div class="col-12 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h3 class="page-title mb-4"> Quiz Number 1 </h3>                    
                    <form action="#" method="post">
                      <div class="d-flex">
                        <p class="me-2 mb-4">Q)</p>
                        <p class="mb-4">What is HTML? What is HTML? What is HTML? What is HTML?</p>
                        <!-- <textarea class="form-control mb-4" id="" rows="3" placeholder="Enter the Question"></textarea> -->
                      </div>                    
                      <div class="d-flex">
                        <p class="me-2 mb-0">a)</p>
                        <p class="mb-0">HTML is a programming language. HTML is a programming language.</p>
                        <!-- <textarea class="form-control mb-1" id="" rows="3" placeholder="Enter the first answer"></textarea> -->
                      </div>
                      <div class="d-flex">
                        <p class="me-2 mb-0">b)</p>
                        <p class="mb-0">It is a style-sheet language.</p>
                        <!-- <textarea class="form-control mb-1" id="" rows="3" placeholder="Enter the second answer"></textarea> -->
                      </div>
                      <div class="d-flex">
                        <p class="me-2">c)</p>
                        <p class="">HTML is used in networking device.</p>
                        <!-- <textarea class="form-control mb-4" id="" rows="3" placeholder="Enter the third answer"></textarea> -->
                      </div>
                      <div class="d-flex mb-4 align-items-center">
                        <p class="me-2 mb-0">Right answer is</p>
                        <mark class="bg-warning text-white mb-0">a</mark>
                        <!-- <div class="d-flex">
                          <div class="form-check me-3">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="" value="" checked>
                              a <i class="input-helper"></i>
                            </label>
                          </div>
                          <div class="form-check me-3">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="" value="">
                              b <i class="input-helper"></i>
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="" value="">
                              c <i class="input-helper"></i>
                            </label>
                          </div>
                        </div> -->
                      </div>
                      <div class="d-flex flex-wrap justify-content-around">
                        <button type="button" class="btn-lg btn-gradient-primary btn-fw">Update</button>
                        <!-- <button type="submit" class="btn-lg btn-gradient-success btn-fw">Submit</button>
                        <button type="reset" class="btn-lg btn-gradient-danger btn-fw">Reset</button>
                        <button type="button" class="btn-lg btn-gradient-info btn-fw">Cancel</button> -->
                      </div>
                    </form>
                  </div>
                </div>
              </div>   
              <div class="col-12 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h3 class="page-title mb-4"> Quiz Number 1 </h3>                    
                    <form action="#" method="post">
                      <div class="d-flex">
                        <p class="me-2 mb-4">Q)</p>
                        <p class="mb-4">What is HTML? What is HTML? What is HTML? What is HTML?</p>
                        <!-- <textarea class="form-control mb-4" id="" rows="3" placeholder="Enter the Question"></textarea> -->
                      </div>                    
                      <div class="d-flex">
                        <p class="me-2 mb-0">a)</p>
                        <p class="mb-0">HTML is a programming language. HTML is a programming language.</p>
                        <!-- <textarea class="form-control mb-1" id="" rows="3" placeholder="Enter the first answer"></textarea> -->
                      </div>
                      <div class="d-flex">
                        <p class="me-2 mb-0">b)</p>
                        <p class="mb-0">It is a style-sheet language.</p>
                        <!-- <textarea class="form-control mb-1" id="" rows="3" placeholder="Enter the second answer"></textarea> -->
                      </div>
                      <div class="d-flex">
                        <p class="me-2">c)</p>
                        <p class="">HTML is used in networking device.</p>
                        <!-- <textarea class="form-control mb-4" id="" rows="3" placeholder="Enter the third answer"></textarea> -->
                      </div>
                      <div class="d-flex mb-4 align-items-center">
                        <p class="me-2 mb-0">Right answer is</p>
                        <mark class="bg-warning text-white mb-0">a</mark>
                        <!-- <div class="d-flex">
                          <div class="form-check me-3">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="" value="" checked>
                              a <i class="input-helper"></i>
                            </label>
                          </div>
                          <div class="form-check me-3">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="" value="">
                              b <i class="input-helper"></i>
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="" value="">
                              c <i class="input-helper"></i>
                            </label>
                          </div>
                        </div> -->
                      </div>
                      <div class="d-flex flex-wrap justify-content-around">
                        <button type="button" class="btn-lg btn-gradient-primary btn-fw">Update</button>
                        <!-- <button type="submit" class="btn-lg btn-gradient-success btn-fw">Submit</button>
                        <button type="reset" class="btn-lg btn-gradient-danger btn-fw">Reset</button>
                        <button type="button" class="btn-lg btn-gradient-info btn-fw">Cancel</button> -->
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-12 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h3 class="page-title mb-4"> Quiz Number 1 </h3>                    
                    <form action="#" method="post">
                      <div class="d-flex">
                        <p class="me-2 mb-4">Q)</p>
                        <p class="mb-4">What is HTML? What is HTML? What is HTML? What is HTML?</p>
                        <!-- <textarea class="form-control mb-4" id="" rows="3" placeholder="Enter the Question"></textarea> -->
                      </div>                    
                      <div class="d-flex">
                        <p class="me-2 mb-0">a)</p>
                        <p class="mb-0">HTML is a programming language. HTML is a programming language.</p>
                        <!-- <textarea class="form-control mb-1" id="" rows="3" placeholder="Enter the first answer"></textarea> -->
                      </div>
                      <div class="d-flex">
                        <p class="me-2 mb-0">b)</p>
                        <p class="mb-0">It is a style-sheet language.</p>
                        <!-- <textarea class="form-control mb-1" id="" rows="3" placeholder="Enter the second answer"></textarea> -->
                      </div>
                      <div class="d-flex">
                        <p class="me-2">c)</p>
                        <p class="">HTML is used in networking device.</p>
                        <!-- <textarea class="form-control mb-4" id="" rows="3" placeholder="Enter the third answer"></textarea> -->
                      </div>
                      <div class="d-flex mb-4 align-items-center">
                        <p class="me-2 mb-0">Right answer is</p>
                        <mark class="bg-warning text-white mb-0">a</mark>
                        <!-- <div class="d-flex">
                          <div class="form-check me-3">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="" value="" checked>
                              a <i class="input-helper"></i>
                            </label>
                          </div>
                          <div class="form-check me-3">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="" value="">
                              b <i class="input-helper"></i>
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="" value="">
                              c <i class="input-helper"></i>
                            </label>
                          </div>
                        </div> -->
                      </div>
                      <div class="d-flex flex-wrap justify-content-around">
                        <button type="button" class="btn-lg btn-gradient-primary btn-fw">Update</button>
                        <!-- <button type="submit" class="btn-lg btn-gradient-success btn-fw">Submit</button>
                        <button type="reset" class="btn-lg btn-gradient-danger btn-fw">Reset</button>
                        <button type="button" class="btn-lg btn-gradient-info btn-fw">Cancel</button> -->
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.php -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between flex-wrap">
              <span class="text-muted fs-6 d-block text-center text-sm-start d-sm-inline-block">Copyright © InfoLAND_admin.com 2024</span>
              <span class="text-muted fs-6 float-none float-sm-end mt-1 mt-sm-0 text-end">Made with Love <i class="mdi mdi-heart"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../my_js/adminLogoutClient.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>