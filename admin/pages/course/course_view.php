<?php 
  session_start(); 
  require "../../db_config.php";
  
  // Display all categories in Filtering bar
  $sql = "SELECT DISTINCT Category FROM course";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
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
        // Global variable for Previous & Next pagination
        let current, numPages;

        // Display Courses data with Pagination
        const viewCourses = async (currentPage) => {
          current = parseInt(currentPage);
          let category = document.getElementById('category').value;
          let price = document.getElementById('price').value;
          const t_body = document.getElementById('t-body');
          const paginationContainer = document.getElementById('pagination-container');
          const paginationLabel = document.getElementById('pagination-label');
          let response;
          let parser = new DOMParser();

          t_body.innerHTML = "";
          paginationLabel.innerText = "";
          paginationContainer.innerHTML = "";

          if (category === '*' && price === '*') {
            response = await fetch(`courseViewPaginationServer.php?current=${current}&param=*`, { method: "GET" });
          } else if (category !== '*' && price === '*') {
            response = await fetch(`courseViewPaginationServer.php?current=${current}&category=${category}`, { method: "GET" });
          } else if (category === '*' && price !== '*') {
            response = await fetch(`courseViewPaginationServer.php?current=${current}&price=${price}`, { method: "GET" });
          } else if (category !== '*' && price !== '*') {
            response = await fetch(`courseViewPaginationServer.php?current=${current}&category=${category}&price=${price}`, { method: "GET" });
          }

          let res = await response.json();
          // Records found or Not
          if (res.hasRecords) {
            paginationContainer.style.display = "flex";
            let courses = res.courses;
            numPages = res.numPages;
            
            courses.forEach((course) => {
              let nodeString = `
                <table>
                  <tbody>
                    <tr>
                      <td>${course.Course_ID}</td>
                      <td>${course.Name}</td>
                      <td style="white-space:normal;">
                        <div class="lh-base" style="width:20rem; height:5rem; overflow-y:auto;">
                          ${course.Description}
                        </div>                              
                      </td>
                      <td>${course.Category}</td>
                      <td>${course.Entry_LP}</td>
                      <td>${course.Goal_LP}</td>
                      <td>${ parseFloat(course.Price) === 0 ? 'Free' : `£ ${course.Price}` }</td>
                      <td>${course.Syllabus}</td>
                      <td>${course.Image}</td>
                      <td><a href="../quizzes/quizzes.php?id=${course.Course_ID}">View Quizzes</a></td>
                      <td><a href="course_update.php?id=${course.Course_ID}">Update Course</a></td>
                      <td><button class="btn btn-inverse-danger btn-fw delete-btn" data-id="${course.Course_ID}">Delete</button></td>
                    </tr>
                  </tbody>
                </table>
              `;
              let DOM = parser.parseFromString(nodeString, 'text/html');
              let nodeHTML = DOM.firstChild.children[1].children[0].children[0].children[0];
              
              t_body.append(nodeHTML);
            });

            // Pagination Interactivity
            const paginationLinkRender = (innerText) => {
              let nodeString;
              // Check Active Page for Highlight
              nodeString = (current === innerText) ? `<li class="page-item active"><a class="page-link" href="course_view.php">${innerText}</a></li>`
                : `<li class="page-item"><a class="page-link" href="course_view.php">${innerText}</a></li>`;
              let DOM = parser.parseFromString(nodeString, 'text/html');
              let nodeHTML = DOM.firstChild.children[1].children[0];
              
              paginationContainer.append(nodeHTML);
            }

            paginationLabel.innerText = `Showing ${current} of ${numPages} pages`;
            paginationLinkRender('Previous');
            for (let i = 1; i <= numPages; i++) {
              paginationLinkRender(i);
            }
            paginationLinkRender('Next');
          } else {
            paginationContainer.style.display = "none";
            let nodeString = `
              <table>
                <tbody>
                  <tr>
                    <td colspan="12">${res.msg}</td>
                  </tr>
                </tbody>
              </table>
            `;
            let DOM = parser.parseFromString(nodeString, 'text/html');
            let nodeHTML = DOM.firstChild.children[1].children[0].children[0].children[0];
            
            t_body.append(nodeHTML);

            // Pagination Interactivity
            paginationLabel.innerText = "Showing 0 of 0 pages";
          }
        }

        // Page Loaded
        viewCourses(1);

        // Filtering the Courses by Category & Price
        const filterForm = document.getElementById('filter-form');

        filterForm.addEventListener('submit', (event) => {
          event.preventDefault();
          viewCourses(1);
        });

        // Pagination Links
        const paginationContainer = document.getElementById('pagination-container');

        paginationContainer.addEventListener('click', (event) => {
          event.preventDefault();
          let elem = event.target;

          if (elem.tagName === 'A' && elem.innerText !== 'Previous' && elem.innerText !== 'Next') {
            viewCourses(elem.innerText);
          } else if (elem.tagName === 'A' && elem.innerText === 'Previous') {
            if (current > 1) {
              viewCourses(--current);
            }
          } else if (elem.tagName === 'A' && elem.innerText === 'Next') {
            if (current < numPages) {
              viewCourses(++current);
            }
          }
        });

        // Delete the Course
        const t_body = document.getElementById('t-body');

        t_body.addEventListener('click', async (event) => {
          let elem = event.target;
          
          if (elem.tagName === 'BUTTON' && elem.classList.contains('delete-btn')) {
            event.preventDefault();
            let id = elem.dataset.id;

            if (confirm('Are you sure you want to delete the course?')) {
              let response = await fetch(`courseDeleteServer.php?id=${id}`, { method: "GET" });
              let res = await response.json();

              if (res.msg) alert(res.msg);
              if (res.success) viewCourses(1);
            }
          }
        });
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
            <form id="filter-form" action="course_view.php" method="get">
              <div class="row">
                <div class="col-md-8 stretch-card grid-margin">
                  <div class="card bg-gradient-success">
                    <div class="card-body d-flex">
                      <select id="category" class="form-control" name="category">
                        <option value="*" selected>Category</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                          <option value="<?= $row['Category'] ?>"><?php if (isset($row['Category'])) echo $row['Category']; ?></option>
                        <?php } ?>
                      </select>
                      <select id="price" class="form-control" name="price">
                        <option value="*" selected>Price</option>
                        <option value="free">Free</option>
                        <option value="paid">Paid</option>
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
                          <th>Syllabus</th>
                          <th>Image</th>
                          <th>Quizzes</th>
                          <th>Action</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="t-body">
                        <!-- Data rendered by javascript -->


                        <!-- Data rendered by javascript -->
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
                    <h5 id="pagination-label"></h5>
                    <ul id="pagination-container" class="pagination mb-0">
                      <!-- Data rendered by javascript -->


                      <!-- Data rendered by javascript -->
                    </ul>
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
<?php mysqli_close($conn) ?>