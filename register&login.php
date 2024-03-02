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
      // Send register form data to the server
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
                  <a href="#" class="active" id="login-form-link">Login</a>
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
                  <form id="login-form" action="#" method="post" role="form" style="display: block;">
                    <div class="form-group">
                      <input type="text" name="username" id="username-login" tabindex="1" class="form-control" placeholder="Username" value="">
                    </div>
                    <div class="form-group text-right">
                      <input type="password" name="password" id="passwordlogin" tabindex="2" class="form-control" placeholder="Password">
                      <p id="togglelogin" style="cursor: pointer;"><i class="fa fa-eye"></i><span>Show</span></p>
                    </div>
                    <div class="form-group text-center">
                      <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                      <label for="remember"> &nbsp; Remember Me</label>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">
                          <button type="submit" class="form-control btn btn-default">Log into Account</button>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="text-center">
                            <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- register form -->
                  <form id="register-form" action="register&login.php" method="post" role="form" style="display: none;" enctype="mutipart/form-data">
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
                      <input type="password" name="con_pass_register" id="confirm-password" tabindex="3" class="form-control" placeholder="Confirm Password" required>
                      <div style="display:flex; justify-content:space-between;">
                        <p id="con-pass-register-msg" class="text-danger"></p>
                        <p id="toggleconfirm" style="cursor: pointer;"><i class="fa fa-eye"></i><span>Show</span></p>
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
</body>
</html>