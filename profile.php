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
              <img src="upload/xstudent_06.png.pagespeed.ic.M4STWuf1XS.png" alt="profilePic" class="img-responsive">
            </div>
            <div class="course-meta">
              <p>Min Thant Win</p>
              <hr>
              <p>minnthantwinn@gmail.com</p>
              <hr>
              <p>minthant2003</p>
            </div>
            <hr class="invis">
            <form id="logout-form" class="col-12" action="profile.php" method="get">
              <button style="width: 100%;" type="submit" class="btn btn-danger">Log Out from Account</button>
              <p id="logout-msg" class="text-info"></p>
            </form>
          </div>
          <div id="course-content" class="col-md-9">
            <div class="course-description">
              <h1 class="course-title">Total Learning Points : 500 LP</h1>
              <h3 class="course-title">Edit Profile</h3>
              <div class="edit-profile">
                <form role="form" action="profile.php" method="post">
                  <div class="form-group">
                    <label>First / Last Name</label>
                    <input type="text" class="form-control" placeholder="Amanda FOX">
                  </div>
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" placeholder="example@email.com">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Amanda">
                  </div>
                  <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" class="form-control" placeholder="************">
                  </div>
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" placeholder="************">
                  </div>
                  <div class="form-group">
                    <label>Re-Enter New Password</label>
                    <input type="password" class="form-control" placeholder="************">
                  </div>
                  <div class="form-group">
                    <label>Upload Profile Picture</label>
                    <input type="file" class="btn btn-primary">
                  </div>
                  <input type="submit" class="btn btn-primary" value="Submit Changes">
                </form>
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
</body>
</html>