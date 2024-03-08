<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InfoLAND | Online Learning Platform</title>
  <link rel="shortcut icon" href="images/tabicon.ico" type="image/x-icon" />

  <?php include("cssExternal.html"); ?>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      // Edit form show impl
      document.getElementById('profile-edit-btn').addEventListener('click', (event) => {
        event.preventDefault();
        document.getElementById('profile-edit').style.display = "block";
        document.getElementById('profile-details').style.display = "none";
      })
      document.getElementById('profile-edit-cancel-btn').addEventListener('click', (event) => {
        event.preventDefault();
        document.getElementById('profile-details').style.display = "block";
        document.getElementById('profile-edit').style.display = "none";
      })

      // Edit Profile Details impl
      const profileEditForm = document.getElementById('profile-edit-form');

      profileEditForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        document.getElementById('uname-edit-msg').innerText = "";
        document.getElementById('pass-edit-msg').innerText = "";
        document.getElementById('con-pass-edit-msg').innerText = "";
        document.getElementById('fname-edit-msg').innerText = "";        
        document.getElementById('profile-edit-msg').innerText = "";
        document.getElementById('edit-msg').innerText = "";

        let profileEditFormData = new FormData(profileEditForm);

        let response = await fetch('learnerProfileEdit.php', {
          method: "POST",
          body: profileEditFormData
        });
        let res = await response.json();

        if (res.uname) document.getElementById('uname-edit-msg').innerText = res.uname;
        if (res.pass) document.getElementById('pass-edit-msg').innerText = res.pass;
        if (res.con_pass) document.getElementById('con-pass-edit-msg').innerText = res.con_pass;
        if (res.fname) document.getElementById('fname-edit-msg').innerText = res.fname;
        if (res.profile) document.getElementById('profile-edit-msg').innerText = res.profile;
        if (res.msg) document.getElementById('edit-msg').innerText = res.msg;
        // Redirect to this page again to highlight updates
        if (res.success) setTimeout(() => window.location.href = "profile.php", 1500);
      })    

      // Fetch the server to Log out
      const logout_form = document.getElementById('logout-form');

      logout_form.addEventListener('submit', async (event) => {
        event.preventDefault();
        document.getElementById('logout-msg').innerText = "";

        let response = await fetch('learnerLogout.php', { method: 'GET' });
        let res = await response.json();

        if (res.msg) document.getElementById('logout-msg').innerText = res.msg;
        // Redirect to the Index page
        if (res.success) setTimeout(() => window.location.href = "index.php", 1500);
      })
    })
  </script>
</head>
<body>
  <?php include("loader.html"); ?>

  <div id="wrapper">
    <?php include("topbar_header.php"); ?>

    <section class="grey page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-left">
            <h1>My Profile</h1>
          </div>
          <div class="col-md-6 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Profile</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="white section">
      <div class="container">
        <div class="row">
          <div id="course-left-sidebar" class="col-md-3">
            <div class="course-image-widget">
              <img src="learner_profile/<?php if (isset($_SESSION['learner']['profile'])) echo $_SESSION['learner']['profile']; ?>" 
                alt="profilePic" class="img-responsive">
            </div>
            <div class="widget-title" style="display: flex; justify-content: start; align-items: center; margin-bottom: 15px;">
              <h3 style="margin: 0; padding: 0;">Learning Points &nbsp;: &nbsp;</h3>
              <h4 style="margin: 0; padding: 0;"><?php if (isset($_SESSION['learner']['LP'])) echo $_SESSION['learner']['LP']; ?> LP</h4>
            </div>
            <form id="logout-form" class="col-12" action="profile.php" method="get">
              <button style="width: 100%;" type="submit" class="btn btn-danger">Log Out from Account</button>
              <p id="logout-msg" class="text-info"></p>
            </form>
          </div>
          <div id="course-content" class="col-md-9">
            <div class="course-description">
              <!-- Profile details view -->
              <div id="profile-details" style="display: block;">
                <div class="widget-title">
                  <h4>Profile Details</h4>
                </div>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>Username:</td>
                      <td><?php if (isset($_SESSION['learner']['uname'])) echo $_SESSION['learner']['uname']; ?></td>
                    </tr>
                    <tr>
                      <td>Fullname:</td>
                      <td><?php if (isset($_SESSION['learner']['fname'])) echo $_SESSION['learner']['fname']; ?></td>
                    </tr>         
                    <tr>
                      <td>Email:</td>
                      <td><?php if (isset($_SESSION['learner']['email'])) echo $_SESSION['learner']['email']; ?></td>
                    </tr>                      
                  </tbody>
                </table>    
                <button id="profile-edit-btn" class="btn btn-primary">Edit Profile</button>
              </div>
              <!-- Profile details edit -->
              <div id="profile-edit" style="display: none;">
                <div class="widget-title">
                  <h4>Edit Profile</h4>
                </div>   
                <div class="edit-profile">
                  <form id="profile-edit-form" role="form" action="profile.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="pro_edit_uname" class="form-control" value="<?php if (isset($_SESSION['learner']['uname'])) echo $_SESSION['learner']['uname']; ?>" 
                        tabindex="1" required>
                      <p id="uname-edit-msg" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                      <label>New Password</label> 
                      <input type="password" name="pro_edit_pass" id="profile-pass" tabindex="2" class="form-control" placeholder="********" required>
                      <div style="display:flex; justify-content:space-between;">
                        <p id="pass-edit-msg" class="text-danger"></p>
                        <p id="profile-pass-toggle" style="cursor: pointer;"><i class="fa fa-eye"></i><span>Show</span></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Confirm New Password</label> 
                      <input type="password" name="pro_edit_con_pass" id="profile-con-pass" tabindex="3" class="form-control" placeholder="********" required>
                      <div style="display:flex; justify-content:space-between;">
                        <p id="con-pass-edit-msg" class="text-danger"></p>
                        <p id="profile-con-pass-toggle" style="cursor: pointer;"><i class="fa fa-eye"></i><span>Show</span></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Fullname</label> 
                      <input type="text" name="pro_edit_fname" class="form-control" value="<?php if (isset($_SESSION['learner']['fname'])) echo $_SESSION['learner']['fname']; ?>" 
                        tabindex="4" required>
                      <p id="fname-edit-msg" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                      <label>Email</label> 
                      <input type="email" name="pro_edit_email" class="form-control" value="<?php if (isset($_SESSION['learner']['email'])) echo $_SESSION['learner']['email']; ?>" 
                        tabindex="5" required>
                    </div>
                    <div class="form-group">
                      <label>Upload Profile Picture</label>
                      <input type="file" name="pro_edit_file" class="btn btn-primary" tabindex="6" required>
                      <p id="profile-edit-msg" class="text-danger"></p>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit Changes">
                    <button id="profile-edit-cancel-btn" class="btn btn-danger">Cancel</button>
                    <p id="edit-msg" class="text-danger"></p>
                  </form>
                </div>
              </div>
              <hr class="invis">

              <h1 class="course-title">In-progress Courses</h1>
              <div class="in-progress">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Item Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <a href="course.php"><img src="upload/xcourse_01.png.pagespeed.ic.XTOvCuUmZu.png" alt="" class="alignleft img-thumbnail" style="max-width:60px; margin: 0 10px">Web Design & Development</a>
                      </td>
                      <td>
                        In progress
                      </td>
                      <td>
                        <form action="download_Quiz.php" method="post">
                          <button type="submit" class="btn btn-primary">Take Course & Quizzes</button>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="course.php"><img src="upload/xcourse_02.png.pagespeed.ic.PL7Wu2UcSB.png" alt="" class="alignleft img-thumbnail" style="max-width:60px; margin: 0 10px">Network System Design & Development</a>
                      </td>
                      <td>
                        In progress
                      </td>
                      <td>
                        <form action="download_Quiz.php" method="post">
                          <button type="submit" class="btn btn-primary">Take Course & Quizzes</button>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="course.php"><img src="upload/xcourse_03.png.pagespeed.ic.8e1MyY5M7i.png" alt="" class="alignleft img-thumbnail" style="max-width:60px; margin: 0 10px">Programming Concepts & Logic</a>
                      </td>
                      <td>
                        In progress
                      </td>
                      <td>
                        <form action="download_Quiz.php" method="post">
                          <button type="submit" class="btn btn-primary">Take Course & Quizzes</button>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <hr class="invis">

              <h1 class="course-title">Completed Courses</h1>
              <div class="complete">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Item Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <a href="course.php"><img src="upload/xcourse_04.png.pagespeed.ic.2rIKmUwjA7.png" alt="" class="alignleft img-thumbnail" style="max-width:60px; margin: 0 10px">Cyber Security</a>
                      </td>
                      <td>
                        Completed
                      </td>
                      <td>
                        <form action="profile.php" method="post">
                          <button type="submit" class="btn btn-default">Take Certificate</button>
                          <button type="submit" class="btn btn-success">Re-visit the course</button>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="course.php"><img src="upload/xcourse_05.png.pagespeed.ic.mrKpzOf8LX.png" alt="" class="alignleft img-thumbnail" style="max-width:60px; margin: 0 10px">Cloud Computing</a>
                      </td>
                      <td>
                        Completed
                      </td>
                      <td>
                        <form action="profile.php" method="post">
                          <button type="submit" class="btn btn-default">Take Certificate</button>
                          <button type="submit" class="btn btn-success">Re-visit the course</button>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <hr class="invis">
              <hr class="invis">              
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include("footer_copyright.php"); ?>
  </div>

  <?php include("jsExternal.html"); ?>
  <script type="text/javascript" src="my_js/passwordtoggle.js"></script>
</body>
</html>