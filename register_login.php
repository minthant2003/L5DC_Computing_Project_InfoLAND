<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InfoLAND | Online Learning Platform</title>
  <link rel="icon shortcut" href="images/tabicon.ico" type="image/x-icon" />

  <?php include("cssExternal.html"); ?>
  
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      // Send Register form data to the Server
      const regis_form = document.getElementById('register-form');

      regis_form.addEventListener('submit', async (event) => {
        document.getElementById('uname-register-msg').innerText = "";
        document.getElementById('pass-register-msg').innerText = "";
        document.getElementById('con-pass-register-msg').innerText = "";
        document.getElementById('fname-register-msg').innerText = "";
        document.getElementById('profile-register-msg').innerText = "";
        document.getElementById('register-msg').innerText = "";

        event.preventDefault();
        let form_data = new FormData(regis_form);
                
        let response = await fetch('learnerRegister.php', {
          method: 'POST',
          body: form_data
        })
        let res = await response.json();
        
        if (res.uname) document.getElementById('uname-register-msg').innerText = res.uname;
        if (res.pass) document.getElementById('pass-register-msg').innerText = res.pass;
        if (res.con_pass) document.getElementById('con-pass-register-msg').innerText = res.con_pass;
        if (res.fname) document.getElementById('fname-register-msg').innerText = res.fname;
        if (res.profile) document.getElementById('profile-register-msg').innerText = res.profile;
        if (res.msg) document.getElementById('register-msg').innerText = res.msg;
        // Redirect to the Index page
        if (res.success) setTimeout(() => window.location.href = "index.php", 2000);
      })

      // Send Login form data to the Server
      const login_form = document.getElementById('login-form');

      login_form.addEventListener('submit', async (event) => {
        document.getElementById('uname-login-msg').innerText = "";
        document.getElementById('pass-login-msg').innerText = "";
        document.getElementById('login-msg').innerText = "";

        event.preventDefault();
        let form_data = new FormData(login_form);

        let response = await fetch('learnerLogin.php', {
          method: 'POST',
          body: form_data
        })
        let res = await response.json();
        
        if (res.uname) document.getElementById('uname-login-msg').innerText = res.uname;
        if (res.pass) document.getElementById('pass-login-msg').innerText = res.pass;
        if (res.msg) document.getElementById('login-msg').innerText = res.msg;
        // Redirect to the Index page
        if (res.success) setTimeout(() => window.location.href = "index.php", 1500);
      })

      // Show Change Password form
      const forget = document.getElementById('forget-pass');

      forget.addEventListener('click', (event) => {
        event.preventDefault();
        document.getElementById('chg-section-link').style.display = 'block';
        document.getElementById('chg-section').style.display = 'block';
        document.getElementById('login-form-link').style.display = 'none';
        document.getElementById('login-form').style.display = 'none';        
      })

      // OTP sending to the learner
      const otp_form = document.getElementById('otp-form');

      otp_form.addEventListener('submit', async (event) => {
        event.preventDefault();
        document.getElementById('otp-email-msg').innerText = "";
        document.getElementById('send-otp-msg').innerText = "Please wait for a moment.";
        
        let otp_form_data = new FormData(otp_form);

        let response = await fetch('sendOTP.php', {
          method: "POST",
          body: otp_form_data
        })
        let res = await response.json();
        
        if (res.email) document.getElementById('otp-email-msg').innerText = res.email;
        if (res.mailMsg) document.getElementById('send-otp-msg').innerText = res.mailMsg;
      })

      // Password change client impl
      const chg_form = document.getElementById('chg-form');

      chg_form.addEventListener('submit', async (event) => {
        event.preventDefault();
        document.getElementById('otp-msg').innerText = "";
        document.getElementById('pass-chg-msg').innerText = "";
        document.getElementById('con-pass-chg-msg').innerText = "";
        document.getElementById('chg-msg').innerText = "";

        let chg_form_data = new FormData(chg_form);
        let response = await fetch('learnerChgPass.php', {
          method: "POST",
          body: chg_form_data
        })
        let res = await response.json();

        if (res.otp) document.getElementById('otp-msg').innerText = res.otp;
        if (res.newPass) document.getElementById('pass-chg-msg').innerText = res.newPass;
        if (res.newConPass) document.getElementById('con-pass-chg-msg').innerText = res.newConPass;
        if (res.chgMsg) document.getElementById('chg-msg').innerText = res.chgMsg;
        if (res.success) {
          setTimeout(() => {
            document.getElementById('login-form-link').style.display = "block";
            document.getElementById('login-form').style.display = "block";
            document.getElementById('chg-section-link').style.display = "none";
            document.getElementById('chg-section').style.display = "none";
          }, 1500);
        }
      })
    })
  </script>
</head>
<body class="login">
  <?php include("loader.html"); ?>

  <div id="wrapper">
    <div class="container">
      <div class="row login-wrapper">
        <div class="col-md-6 col-md-offset-3">
          <div class="logo logo-center">
            <a href="index.php"><img src="images/logoLogin.png" alt="InfoLAND Logo"></a>
          </div>
          <div class="panel panel-login">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <a href="#" class="active" id="login-form-link" style="display: block;">Login</a>
                  <a href="#" id="chg-section-link" style="display: none;">Change Password</a>
                </div>
                <div class="col-xs-6">
                  <a href="#" id="register-form-link">Register</a>
                </div>
              </div>
              <hr>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <!-- login form -->
                  <form id="login-form" action="register_login.php" method="post" role="form" style="display: block;">
                    <div class="form-group">
                      <input type="text" name="uname_login" id="username-login" tabindex="1" class="form-control" placeholder="Username" value="" required>
                      <p id="uname-login-msg" class="text-danger"></p>
                    </div>
                    <div class="form-group text-right">
                      <input type="password" name="pass_login" id="passwordlogin" tabindex="2" class="form-control" placeholder="Password" required>
                      <div style="display:flex; justify-content:space-between;">
                        <p id="pass-login-msg" class="text-danger"></p>
                        <p id="togglelogin" style="cursor: pointer;"><i class="fa fa-eye"></i><span>Show</span></p>
                      </div>
                    </div>
                    <div class="form-group text-center">
                      <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                      <label for="remember"> &nbsp; Remember Me</label>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">
                          <button type="submit" class="form-control btn btn-default">Log into Account</button>
                          <p id="login-msg" class="text-info"></p>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="text-center">
                            <a href="#" class="forgot-password" id="forget-pass">Forgot Password?</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                  <!-- OTP and Change password section -->
                  <div id="chg-section" style="display: none;">
                    <!-- OTP form -->
                    <form id="otp-form" action="register_login.php" method="post" role="form">
                      <div class="form-group">
                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Registered Email Address" value="" required>
                        <p id="otp-email-msg" class="text-info"></p>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <button type="submit" class="form-control btn btn-default">Send OTP to Email</button>
                            <p id="send-otp-msg" class="text-info"></p>
                          </div>
                        </div>
                      </div>                                       
                    </form>
                    
                    <!-- Change password form -->
                    <form id="chg-form" action="register_login.php" method="post" role="form">                    
                      <div class="form-group">
                        <input type="text" name="OTP" id="otp" tabindex="1" class="form-control" placeholder="OTP" value="" required>
                        <p id="otp-msg" class="text-danger"></p>
                      </div>
                      <div class="form-group text-right">
                        <input type="password" name="pass_chg" id="passwordchg" tabindex="2" class="form-control" placeholder="New Password" required>
                        <div style="display:flex; justify-content:space-between;">
                          <p id="pass-chg-msg" class="text-danger"></p>
                          <p id="togglechg" style="cursor: pointer;"><i class="fa fa-eye"></i><span>Show</span></p>
                        </div>
                      </div>
                      <div class="form-group text-right">
                        <input type="password" name="con_pass_chg" id="confirm-password-chg" tabindex="3" class="form-control" placeholder="Confirm New Password" required>
                        <div style="display:flex; justify-content:space-between;">
                          <p id="con-pass-chg-msg" class="text-danger"></p>
                          <p id="toggleconfirm-chg" style="cursor: pointer;"><i class="fa fa-eye"></i><span>Show</span></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <button type="submit" class="form-control btn btn-default">Change Password</button>
                            <p id="chg-msg" class="text-info"></p>
                          </div>
                        </div>
                      </div>                    
                    </form>
                  </div>

                  <!-- register form -->
                  <form id="register-form" action="register_login.php" method="post" role="form" style="display: none;" enctype="mutipart/form-data">
                    <div class="form-group">
                      <input type="text" name="uname_register" id="username-register" tabindex="1" class="form-control" placeholder="Username" value="" required>
                      <p id="uname-register-msg" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass_register" id="passwordreg" tabindex="2" class="form-control" placeholder="Password" required>
                      <div style="display:flex; justify-content:space-between;">
                        <p id="pass-register-msg" class="text-danger"></p>
                        <p id="togglereg" style="cursor: pointer;"><i class="fa fa-eye"></i><span>Show</span></p>
                      </div>
                    </div>
                    <div class="form-group text-right">
                      <input type="password" name="con_pass_register" id="confirm-password-regis" tabindex="3" class="form-control" placeholder="Confirm Password" required>
                      <div style="display:flex; justify-content:space-between;">
                        <p id="con-pass-register-msg" class="text-danger"></p>
                        <p id="toggleconfirm-regis" style="cursor: pointer;"><i class="fa fa-eye"></i><span>Show</span></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="text" name="fullname" id="fullname-register" tabindex="4" class="form-control" placeholder="Fullname" value="" required>
                      <p id="fname-register-msg" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" id="email" tabindex="5" class="form-control" placeholder="Email Address" value="" required>
                    </div>
                    <div class="form-group">
                      <label>Upload Profile Picture</label>
                      <input type="file" name="profile" class="btn btn-primary form-control" tabindex="6" required>
                      <p id="profile-register-msg" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">
                          <button type="submit" class="form-control btn btn-default btn-block">Register an Account</button>
                          <p id="register-msg" class="text-info"></p>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include("jsExternal.html"); ?>
  <script type="text/javascript" src="my_js/passwordtoggle.js"></script>
  <script type="text/javascript" src="my_js/login_regis_chg_form_link.js"></script>
</body>
</html>