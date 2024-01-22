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
                  <img src="../../assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">InfoLAND admin</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#"><i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
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
                  <img src="../../assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">InfoLAND admin</span>
                  <span class="text-secondary text-small">Administrator Role</span>
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
            <form action="sale_records.php" method="">
              <div class="row">
                <div class="col-md-8 stretch-card grid-margin">
                  <div class="card bg-gradient-danger">
                    <div class="card-body d-flex">
                      <select class="form-control" name="" id="">
                        <option value="">Yearly</option>
                        <option value="">2022</option>
                        <option value="">2023</option>
                        <option value="">2024</option>
                      </select>
                      <select class="form-control" name="" id="">
                        <option value="">Monthly</option>
                        <option value="">January</option>
                        <option value="">February</option>
                        <option value="">March</option>
                        <option value="">April</option>
                        <option value="">May</option>
                        <option value="">June</option>
                        <option value="">July</option>
                        <option value="">August</option>
                        <option value="">September</option>
                        <option value="">October</option>
                        <option value="">November</option>
                        <option value="">Decemberss</option>
                      </select>
                      <select class="form-control" name="" id="">
                        <option value="">Course Name</option>
                        <option value="">Web Development</option>
                        <option value="">Basic Networking</option>
                        <option value="">Cyber Security</option>
                      </select>
                      <select class="form-control" name="" id="">
                        <option value="">Category</option>
                        <option value="">Software Engineering</option>
                        <option value="">Network Engineering</option>
                        <option value="">Cyber Security</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="row">
                    <div class="card">
                      <div class="card-body">
                        <input type="submit" value="Filter" class="btn btn-gradient-primary me-2">
                        <input type="reset" value="Reset" class="btn btn-light btn-gradient-warning">
                      </div>
                    </div>
                  </div>
                </div>                                
              </div>
            </form>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sale Records</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Sale ID</th>
                          <th>Course ID</th>
                          <th>Course Name</th>
                          <th>Course Category</th>
                          <th>Learner ID</th>
                          <th>Learner Name</th>
                          <th>Sale Amount</th>
                          <th>Sale Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-danger">1</td>
                          <td>3</td>
                          <td>Programming with JAVA</td>
                          <td>Software Engineering</td>
                          <td>14</td>
                          <td>Min Thant</td>
                          <td class="text-danger">£ 100</td>
                          <td class="text-danger">2024-01-18</td>                        
                        </tr>
                        <tr>
                          <td class="text-danger">1</td>
                          <td>3</td>
                          <td>Programming with JAVA</td>
                          <td>Software Engineering</td>
                          <td>14</td>
                          <td>Min Thant</td>
                          <td class="text-danger">£ 100</td>
                          <td class="text-danger">2024-01-18</td>                        
                        </tr>
                        <tr>
                          <td class="text-danger">1</td>
                          <td>3</td>
                          <td>Programming with JAVA</td>
                          <td>Software Engineering</td>
                          <td>14</td>
                          <td>Min Thant</td>
                          <td class="text-danger">£ 100</td>
                          <td class="text-danger">2024-01-18</td>                        
                        </tr>
                        <tr>
                          <td class="text-danger">1</td>
                          <td>3</td>
                          <td>Programming with JAVA</td>
                          <td>Software Engineering</td>
                          <td>14</td>
                          <td>Min Thant</td>
                          <td class="text-danger">£ 100</td>
                          <td class="text-danger">2024-01-18</td>                        
                        </tr>
                        <tr>
                          <td class="text-danger">1</td>
                          <td>3</td>
                          <td>Programming with JAVA</td>
                          <td>Software Engineering</td>
                          <td>14</td>
                          <td>Min Thant</td>
                          <td class="text-danger">£ 100</td>
                          <td class="text-danger">2024-01-18</td>                        
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-8 grind-margin stretch-card">
                <div class="card">
                  <div class="card-body d-flex justify-content-around align-items-center">
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
            <div class="container-fluid d-flex justify-content-between">
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
    <!-- End custom js for this page -->
  </body>
</html>