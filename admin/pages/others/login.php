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
        const signInForm = document.getElementById('sign-in-form');

        signInForm.addEventListener('submit', async (event) => {
          event.preventDefault();

          document.getElementById('sign-in-msg').innerText = "";
          document.getElementById('pass-msg').innerText = "";
          document.getElementById('uname-msg').innerText = "";

          let signIn_formData = new FormData(signInForm);

          let response = await fetch('adminLoginServer.php', {
            method: "POST",
            body: signIn_formData
          });
          let res = await response.json();

          if (res.uname) document.getElementById('uname-msg').innerText = res.uname;
          if (res.pass) document.getElementById('pass-msg').innerText = res.pass;
          if (res.msg) document.getElementById('sign-in-msg').innerText = res.msg;
          if (res.success) setTimeout(() => window.location.href = "../../index.php", 1500);
        });
      });
    </script>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/logo.png">
                </div>
                <h4>Welcome again InfoLAND admin!</h4>
                <form action="login.php" id="sign-in-form" method="post" class="pt-3">
                  <div class="form-group">
                    <input type="text" name="uname" class="form-control form-control-lg" placeholder="Enter Username">
                    <p id="uname-msg" class="text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input type="password" name="pass" class="form-control form-control-lg" id="pass-login" placeholder="Enter Password">
                    <div class="d-flex justify-content-between">
                      <p id="pass-msg" class="text-danger"></p>
                      <p id="toggle-login" role="button"><i class="mdi mdi-eye"></i><span>Show</span></p>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-gradient-primary me-2">SIGN IN</button>
                    <p id="sign-in-msg" class="text-danger"></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
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
    <script src="../../my_js/passwordToggle.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>