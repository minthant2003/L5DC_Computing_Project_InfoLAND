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
                <a id="sign-out" class="dropdown-item" href="course_view.php"><i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
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
              <h3 class="page-title"> All Courses </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Courses</li>
                </ol>
              </nav>
            </div>           
            <form action="course_view.php" method="">
              <div class="row">
                <div class="col-md-8 stretch-card grid-margin">
                  <div class="card bg-gradient-success">
                    <div class="card-body d-flex">
                      <select class="form-control" name="" id="">
                        <option value="">Category</option>
                        <option value="">Programming</option>
                        <option value="">Networking</option>
                      </select>
                      <select class="form-control" name="" id="">
                        <option value="">Name</option>
                        <option value="">Java</option>
                        <option value="">CCNA</option>
                      </select>
                      <select class="form-control" name="" id="">
                        <option value="">Free</option>
                        <option value="">Paid</option>
                      </select>                      
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">                
                  <div class="card">
                    <div class="card-body d-flex flex-wrap justify-content-around">
                      <input type="submit" value="Filter" class="px-4 px-md-2 px-xl-4 py-3 rounded-3 btn-gradient-primary">
                      <input type="reset" value="Reset" class="px-4 px-md-2 px-xl-4 py-3 rounded-3 btn-light btn-gradient-warning">
                    </div>
                  </div>                
                </div>                                
              </div>
            </form>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Courses</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Category</th>
                          <th>Entry LP</th>
                          <th>Goal LP</th>
                          <th>Price</th>
                          <th>Learning Material</th>
                          <th>Quizzes</th>
                          <th>Action</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <form action="course_view.php" method="post">
                          <tr>
                            <td>1</td>
                            <td>Programming with JAVA</td>
                            <td style="white-space:normal;">
                              <div class="lh-base" style="width:20rem; height:5rem; overflow-y:auto;">
                                JAVA Introduction to Advanced JAVA Introduction to Advanced JAVA Introduction to Advanced JAVA Introduction to Advanced JAVA Introduction to Advanced JAVA Introduction to Advanced
                              </div>                              
                            </td>
                            <td>Software Engineering</td>
                            <td>30</td>
                            <td>5</td>
                            <td>£ 100</td>
                            <td>Programming with JAVA.pdf</td>
                            <td><a href="../quizzes/quizzes.php">View Quizzes</a></td>
                            <td><a href="course_update.php">Update Course</a></td>
                            <td><button type="submit" class="btn btn-inverse-danger btn-fw">Delete</button></td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Programming with JAVA</td>
                            <td style="white-space:normal;">
                              <div class="lh-base" style="width:20rem; height:5rem; overflow-y:auto;">
                                JAVA Introduction to Advanced JAVA Introduction to Advanced JAVA Introduction to Advanced 
                              </div>                              
                            </td>
                            <td>Software Engineering</td>
                            <td>0</td>
                            <td>5</td>
                            <td>Free</td>
                            <td>Programming with JAVA.pdf</td>
                            <td><a href="../quizzes/quizzes.php">View Quizzes</a></td>
                            <td><a href="course_update.php">Update Course</a></td>
                            <td><button type="submit" class="btn btn-inverse-danger btn-fw">Delete</button></td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Programming with JAVA</td>
                            <td style="white-space:normal;">
                              <div class="lh-base" style="width:20rem; height:5rem; overflow-y:auto;">
                                JAVA Introduction to Advanced JAVA Introduction to Advanced 
                              </div>                              
                            </td>
                            <td>Software Engineering</td>
                            <td>30</td>
                            <td>5</td>
                            <td>£ 100</td>
                            <td>Programming with JAVA.pdf</td>
                            <td><a href="../quizzes/quizzes.php">View Quizzes</a></td>
                            <td><a href="course_update.php">Update Course</a></td>
                            <td><button type="submit" class="btn btn-inverse-danger btn-fw">Delete</button></td>
                          </tr>
                        </form>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-8 grind-margin stretch-card">
                <div class="card">
                  <div class="card-body d-flex justify-content-around align-items-center flex-wrap">
                    <h5>Showing 1 of 10 pages</h5>
                    <nav aria-label="Page navigation example">
                      <ul class="pagination mb-0">
                        <li class="page-item"><a class="page-link" href="#">First</a></li>
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        <li class="page-item"><a class="page-link" href="#">Last</a></li>
                      </ul>
                    </nav>
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