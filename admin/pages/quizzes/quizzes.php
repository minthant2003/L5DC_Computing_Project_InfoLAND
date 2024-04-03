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
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', () => {
        let quizContainer = document.getElementById('quiz-container');

        let params = new URLSearchParams(window.location.search);
        let courseID = params.get('id');

        // Method for Rendering Quizzzes data
        const renderQuizzes = async () => {
          let parser = new DOMParser();
          let counter = 0;

          quizContainer.innerHTML = "";

          let response = await fetch(`renderQuizzesServer.php?id=${courseID}`, { method: "GET" });
          let quizzes = await response.json();

          quizzes.forEach(quiz => {
            counter++;
            let nodeString = `
              <div class="col-12 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h3 class="page-title mb-4"> Quiz Number ${counter} </h3>
                    <form class="update-form" action="quizzes.php" method="post">
                      <div>
                        <div class="d-flex">
                          <p class="me-2 mb-4">Q)</p>
                          <p class="mb-4">${quiz.quest}</p>
                        </div>                    
                        <div class="d-flex">
                          <p class="me-2 mb-0">a)</p>
                          <p class="mb-0">${quiz.opts[0].text}</p>
                        </div>
                        <div class="d-flex">
                          <p class="me-2 mb-0">b)</p>
                          <p class="mb-0">${quiz.opts[1].text}</p>
                        </div>
                        <div class="d-flex">
                          <p class="me-2">c)</p>
                          <p>${quiz.opts[2].text}</p>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                          <div class="d-flex">
                            <p class="me-2 mb-0">Right answer is</p>
                            <mark class="bg-warning text-white mb-0">${quiz.ans}</mark>
                          </div>                          
                        </div>
                        <div class="d-flex flex-wrap justify-content-around">
                          <button type="button" class="btn-lg btn-gradient-primary btn-fw">Update</button>
                          <button type="button" class="btn-lg btn-gradient-danger btn-fw" data-id="${quiz.id}">Delete</button>
                        </div>
                      </div>
                      <div class="d-none">
                        <div class="d-flex">
                          <p class="me-2 mb-4">Q)</p>
                          <textarea class="quest form-control mb-4" rows="3" placeholder="Enter the Question" required>${quiz.quest}</textarea>
                        </div>
                        <div class="d-flex">
                          <p class="me-2 mb-0">a)</p>
                          <textarea class="opt-1 form-control mb-1" rows="3" placeholder="Enter the first option" 
                            data-id="${quiz.opts[0].id}" required>${quiz.opts[0].text}</textarea>
                        </div>
                        <div class="d-flex">
                          <p class="me-2 mb-0">b)</p>
                          <textarea class="opt-2 form-control mb-1" rows="3" placeholder="Enter the second option" 
                            data-id="${quiz.opts[1].id}" required>${quiz.opts[1].text}</textarea>
                        </div>
                        <div class="d-flex">
                          <p class="me-2">c)</p>
                          <textarea class="opt-3 form-control mb-4" rows="3" placeholder="Enter the third option" 
                            data-id="${quiz.opts[2].id}" required>${quiz.opts[2].text}</textarea>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                          <div>
                            <p class="me-2 mb-0">Right answer is</p>
                          </div>
                          <div class="d-flex">
                            <div class="form-check me-3">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="opt-${counter}" value="a" required>
                                a <i class="input-helper"></i>
                              </label>
                            </div>
                            <div class="form-check me-3">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="opt-${counter}" value="b">
                                b <i class="input-helper"></i>
                              </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="opt-${counter}" value="c">
                                c <i class="input-helper"></i>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex mb-4 flex-wrap justify-content-around">
                          <button type="submit" class="update-btn btn-lg btn-gradient-success btn-fw" data-id="${quiz.id}">Submit</button>
                          <button type="reset" class="btn-lg btn-gradient-danger btn-fw">Reset</button>
                          <button type="button" class="btn-lg btn-gradient-info btn-fw">Cancel</button>
                        </div>
                        <div class="d-flex justify-content-center">
                          <p class="update-msg text-danger"></p>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            `;
            let DOM = parser.parseFromString(nodeString, 'text/html');
            let nodeHTML = DOM.firstChild.children[1].children[0];

            quizContainer.append(nodeHTML);
          });
        }

        // Page Loaded
        renderQuizzes();

        // Update Quiz Information
        quizContainer.addEventListener('submit', async (event) => {
          event.preventDefault();
          let updateFormElem = event.target;
          
          updateFormElem.children[1].querySelector('.update-msg').innerText = "";

          let quiz = new FormData();
          let opt_1 = {}, opt_2 = {}, opt_3 = {};
          let opts = [];

          let quizID = updateFormElem.children[1].querySelector('.update-btn').dataset.id;
          let quest = updateFormElem.children[1].querySelector('.quest').value;
          let opt_1_text = updateFormElem.children[1].querySelector('.opt-1').value;
          let opt_1_id = updateFormElem.children[1].querySelector('.opt-1').dataset.id;
          let opt_2_text = updateFormElem.children[1].querySelector('.opt-2').value;
          let opt_2_id = updateFormElem.children[1].querySelector('.opt-2').dataset.id;
          let opt_3_text = updateFormElem.children[1].querySelector('.opt-3').value;
          let opt_3_id = updateFormElem.children[1].querySelector('.opt-3').dataset.id;
          let ans = updateFormElem.children[1].querySelector('input[type="radio"]:checked').value;

          opt_1.id = opt_1_id;
          opt_1.text = opt_1_text;
          opt_2.id = opt_2_id;
          opt_2.text = opt_2_text;
          opt_3.id = opt_3_id;
          opt_3.text = opt_3_text;

          opts.push(opt_1);
          opts.push(opt_2);
          opts.push(opt_3);

          quiz.append('id', quizID);
          quiz.append('quest', quest);
          quiz.append('ans', ans);
          quiz.append('opts', JSON.stringify(opts));

          let response = await fetch('quizUpdateServer.php', {
            method: "POST",
            body: quiz
          });
          let res = await response.json();

          if (res.msg) updateFormElem.children[1].querySelector('.update-msg').innerText = res.msg;
          if (res.success) setTimeout(() => renderQuizzes() , 1500);
        });
                
        // Update Form Control Centre
        quizContainer.addEventListener('click', async (event) => {
          let elem = event.target;

          if (elem.tagName === 'BUTTON' && elem.innerText === 'Update') {
            event.preventDefault();
            let formDiv = elem.parentNode.parentNode.parentNode;
            
            formDiv.children[0].classList.toggle('d-none');
            formDiv.children[1].classList.toggle('d-none');
          } else if (elem.tagName === 'BUTTON' && elem.innerText === 'Cancel') {
            event.preventDefault();
            let formDiv = elem.parentNode.parentNode.parentNode;

            formDiv.children[0].classList.toggle('d-none');
            formDiv.children[1].classList.toggle('d-none');
          }
          else if (elem.tagName === 'BUTTON' && elem.innerText === 'Delete') {
            // Logic for Quiz Delete
            let quizzesDiv = quizContainer.children;
            
            if (quizzesDiv.length <= 3) {
              alert('Could not Delete. Each Course must have at least 3 Quizzes.');
            } else {
              if (confirm('Are you sure you want to Delete the Quiz?')) {
                let quizID = elem.dataset.id;

                let response = await fetch(`quizDeleteServer.php?id=${quizID}`, { method: "GET" });
                let res = await response.json();

                if (res.msg) alert(res.msg);
                if (res.success) renderQuizzes();
              }
            }
          }
        });

        // Append Quizzes according to the Number
        const quizNumAdd = document.getElementById('quiz-num-add');

        quizNumAdd.addEventListener('click', (event) => {
          event.preventDefault();
          const moreQuizContainer = document.getElementById('more-quiz-container');

          moreQuizContainer.innerHTML = "";
          let quizNum = document.getElementById('quiz-num').value;
          let parser = new DOMParser();

          for (let i = 1; i <= quizNum; i++) {
            let nodeString = `
              <div class="col-12 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h3 class="page-title mb-4"> Quiz Number ${i} </h3>                      
                    <div class="d-flex">
                      <p class="me-2 mb-4">Q)</p>
                      <textarea class="question form-control mb-4" rows="3" placeholder="Enter the Question" required></textarea>
                    </div>                    
                    <div class="d-flex">
                      <p class="me-2 mb-0">a)</p>                        
                      <textarea class="first-opt form-control mb-1" rows="3" placeholder="Enter the first Option" required></textarea>
                    </div>
                    <div class="d-flex">
                      <p class="me-2 mb-0">b)</p>                        
                      <textarea class="second-opt form-control mb-1" rows="3" placeholder="Enter the second Option" required></textarea>
                    </div>
                    <div class="d-flex">
                      <p class="me-2">c)</p>                        
                      <textarea class="third-opt form-control mb-4" rows="3" placeholder="Enter the third Option" required></textarea>
                    </div>
                    <div class="d-flex mb-4 align-items-center">
                      <p class="me-2 mb-0">Right answer is</p>
                      <div class="d-flex">
                        <div class="form-check me-3">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightAns_${i}" value="a" required>
                            a <i class="input-helper"></i>
                          </label>
                        </div>
                        <div class="form-check me-3">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightAns_${i}" value="b">
                            b <i class="input-helper"></i>
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightAns_${i}" value="c">
                            c <i class="input-helper"></i>
                          </label>
                        </div>
                      </div>
                    </div>                                        
                  </div>
                </div>
              </div>
            `;
            let DOM = parser.parseFromString(nodeString, 'text/html');
            let nodeHTML = DOM.firstChild.children[1].children[0];
            
            moreQuizContainer.append(nodeHTML);
          }
        });

        // Add More Quizzes
        const addMoreQuizzesForm = document.getElementById('add-more-quizzes-form');

        addMoreQuizzesForm.addEventListener('submit', async (event) => {
          event.preventDefault();
          document.getElementById('add-quizzes-msg').innerText = "";

          const moreQuizContainer = document.getElementById('more-quiz-container');

          if (moreQuizContainer.children.length === 0) {
            document.getElementById('add-quizzes-msg').innerText = "Add Quizzes first.";
          } else {
            let moreQuizzes = new FormData();
            // HTMLCollection to Array
            let quizzes_collection = moreQuizContainer.children;
            let quizzes_array = [...quizzes_collection];
            // Quizzes data
            let quizzes = [];

            quizzes_array.forEach(quizDiv => {
              let quiz = {};
              
              let opts = [];
              let opt_1 = {}, opt_2 = {}, opt_3 = {};
              
              opt_1.text = quizDiv.getElementsByClassName('first-opt')[0].value;
              opt_2.text = quizDiv.getElementsByClassName('second-opt')[0].value;
              opt_3.text = quizDiv.getElementsByClassName('third-opt')[0].value;
              opts.push(opt_1);
              opts.push(opt_2);
              opts.push(opt_3);
              
              quiz.quest = quizDiv.getElementsByClassName('question')[0].value;
              quiz.opts = opts;
              quiz.ans = quizDiv.querySelector('input[type="radio"]:checked').value;
              
              quizzes.push(quiz);
            });

            moreQuizzes.append('courseID', courseID);
            moreQuizzes.append('quizzes', JSON.stringify(quizzes));

            let response = await fetch('moreQuizzesAddServer.php', {
              method: "POST",
              body: moreQuizzes
            });
            let res = await response.json();

            if (res.msg) document.getElementById('add-quizzes-msg').innerText = res.msg;
            if (res.success) {
              setTimeout(() => {
                renderQuizzes();
                moreQuizContainer.innerHTML = "";
                document.getElementById('quiz-num').value = "";
                document.getElementById('add-quizzes-msg').innerText = "";
              }, 1500);
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
            <div id="quiz-container" class="row">
              <!-- Data Rendered by javascript -->


              <!-- Data Rendered by javascript -->
            </div>
            <form id="add-more-quizzes-form" action="quizzes.php" method="post">
              <div class="row">
                <div class="col-12 stretch-card grid-margin">
                  <div class="card">
                    <div class="card-body row align-items-center">
                      <div class="col-8">
                        <div class="form-group row align-items-center mb-0">
                          <label class="col-6 col-form-label">Add More Quizzes</label>
                          <div class="col-6">
                            <input id="quiz-num" type="number" class="form-control" min="1" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <button id="quiz-num-add" class="btn btn-gradient-info" type="button">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="more-quiz-container">
                  <!-- Data rendered by Javascript -->
  
  
                  <!-- Data rendered by Javascript -->
                </div>
                <div class="col-12 d-flex justify-content-around">
                  <button type="submit" class="btn-lg btn-gradient-success btn-fw">Add Quizzes</button>
                  <button type="reset" class="btn-lg btn-gradient-danger btn-fw">Clear</button>
                </div>
                <div class="d-flex justify-content-center">
                  <p id="add-quizzes-msg" class="text-danger"></p>
                </div>
              </div>
            </form>
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