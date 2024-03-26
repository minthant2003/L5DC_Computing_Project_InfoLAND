<?php
  session_start();
  require "../../db_config.php";

  if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // The Specified Course Data
    $sql = "SELECT * FROM course WHERE Course_ID=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {
      $course = mysqli_fetch_assoc($result);
    }

    // All available Course Categories
    $categories = [];
    $sql = "SELECT DISTINCT Category FROM course";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    while ($category = mysqli_fetch_assoc($result)) {
      $categories[] = $category;
    }
  }
?>
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
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', () => {
        const courseType = document.getElementById('course-type');

        // Method for Free or Paid
        const freeOrPaid = () => {
          if (courseType !== null && courseType.value === 'free') {
            document.getElementById('entry-lp').style.display = "none";
            document.getElementById('entry_LP').required = false;

            document.getElementById('price-container').style.display = "none";
            document.getElementById('price').required = false;
          } else if (courseType !== null && courseType.value === 'paid') {
            document.getElementById('entry-lp').style.display = "block";
            document.getElementById('entry_LP').required = true;

            document.getElementById('price-container').style.display = "block";
            document.getElementById('price').required = true;
          }
        }

        // Page Loaded
        freeOrPaid();

        // Course Type changed
        if (courseType !== null) {
          courseType.addEventListener('change', (event) => {
            event.preventDefault();
            freeOrPaid();
          });
        }

        // Update the Course Info
        const updateForm = document.getElementById('update-form');

        if (updateForm !== null) {
          updateForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            document.getElementById('update-course-msg').innerText = "";

            let course = new FormData();
            let params = new URLSearchParams(window.location.search);
            let id = params.get('id');
            
            course.append('id', id);
            course.append('name', document.getElementById('name').value);
            course.append('desc', document.getElementById('desc').value);
            course.append('category', document.getElementById('category').value);
            if (courseType.value === 'paid') course.append('entry_LP', document.getElementById('entry_LP').value);
            course.append('goal_LP', document.getElementById('goal_LP').value);
            if (courseType.value === 'paid') course.append('price', document.getElementById('price').value);
            course.append('syllabus', document.getElementById('course-syllabus').files[0]);
            course.append('img', document.getElementById('course-img').files[0]);

            let response = await fetch('courseUpdateServer.php', {
              method: "POST",
              body: course
            });
            let res = await response.json();

            if (res.syllabus) document.getElementById('update-course-msg').innerText = res.syllabus;
            else if (res.img) document.getElementById('update-course-msg').innerText = res.img;
            else if (res.msg) document.getElementById('update-course-msg').innerText = res.msg;
            if (res.success) setTimeout(() => window.location.href = "course_view.php", 1500);
          });
        }
      });
    </script>
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
                <a id="sign-out" class="dropdown-item" href="course_update.php"><i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
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
              <h3 class="page-title"> Course Update </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="course_view.php">Courses</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Course Update</li>
                </ol>
              </nav>
            </div>  
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update form</h4>
                  <?php if (isset($course)) { ?>
                    <form id="update-form" action="course_update.php" method="post" class="form-sample">
                      <p class="card-description mb-0"> Course Name: <?php if (isset($course)) echo $course['Name']; ?> </p>
                      <p class="card-description"> Course ID: <?php if (isset($course)) echo $course['Course_ID']; ?> </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input id="name" type="text" class="form-control" value="<?php if (isset($course)) echo $course['Name']; ?>" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                              <textarea id="desc" class="form-control" rows="4" required><?php if (isset($course)) echo $course['Description']; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                              <select id="category" class="form-control form-control-sm" required>
                                <?php foreach($categories as $category) {
                                  if ($course['Category'] === $category['Category']) { ?>
                                    <option value="<?= $category['Category']; ?>" selected><?= $category['Category']; ?></option>
                                  <?php } else { ?>
                                    <option value="<?= $category['Category']; ?>"><?= $category['Category']; ?></option>
                                  <?php }
                                } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                              <select id="course-type" class="form-control form-control-sm" required>
                                <?php if ((float) $course['Price'] === 0.00) { ?>
                                  <option value="free" selected>Free</option>
                                  <option value="paid">Paid</option>
                                <?php } else { ?>
                                  <option value="free">Free</option>
                                  <option value="paid" selected>Paid</option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div id="entry-lp" class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Entry LP</label>
                            <div class="col-sm-9">
                              <input id="entry_LP" type="number" class="form-control" min="0"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Goal LP</label>
                            <div class="col-sm-9">
                              <input id="goal_LP" type="number" class="form-control" min="1" required/>
                            </div>
                          </div>
                        </div>
                        <div id="price-container" class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-primary text-white">£</span>
                                  </div>
                                  <input id="price" type="number" min="1" step="0.01" class="form-control"/>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row align-items-center">
                            <label class="col-sm-3 col-form-label">Course Syllabus</label>
                            <div class="col-sm-9">
                              <input id="course-syllabus" role="button" type="file" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row align-items-center">
                            <label class="col-sm-3 col-form-label">Course Image</label>
                            <div class="col-sm-9">
                              <input id="course-img" role="button" type="file" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-around">
                        <button type="submit" class="btn-lg btn-gradient-success btn-fw">Update</button>
                        <button type="reset" class="btn-lg btn-gradient-danger btn-fw">Clear</button>
                      </div>
                      <div class="d-flex justify-content-center">
                        <p id="update-course-msg" class="text-danger"></p>
                      </div>
                    </form>
                  <?php } else { ?>
                    <p class="text-danger card-description mb-0">No Record found.</p>
                  <?php } ?>
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
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../my_js/adminLogoutClient.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
<?php mysqli_close($conn); ?>