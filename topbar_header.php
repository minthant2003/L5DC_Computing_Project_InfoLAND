<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-left">
        <p><i class="fa fa-graduation-cap fa-lg"></i> one of the best online learning platform.</p>
      </div>
      <div class="col-md-6 text-right">
        <ul class="list-inline">
          <li>
            <a class="social" href="#"><i class="fa fa-facebook"></i></a>
            <a class="social" href="#"><i class="fa fa-twitter"></i></a>
            <a class="social" href="#"><i class="fa fa-instagram"></i></a>
            <a class="social" href="#"><i class="fa fa-linkedin"></i></a>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-lock"></i> Login & Register</a>
            <div class="dropdown-menu">
              <form method="post">
                <div class="form-title">
                  <h4>Login Area</h4>
                  <hr>
                </div>
                <input class="form-control" type="text" name="username" placeholder="User Name">
                <div class="formpassword">
                  <input class="form-control" type="password" name="password" placeholder="******">
                </div>
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-block btn-primary">Login</button>
                <hr>
                <h4><a href="#">Create an Account</a></h4>
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<header class="header">
  <div class="container">
    <div class="hovermenu ttmenu">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
          </button>
          <div class="logo">
            <a class="navbar-brand" href="index.php"><img src="images/logoHeader.png" alt="InfoLAND logo"></a>
          </div>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="coursesView.php">Courses</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <?php if (isset($_COOKIE['learner_id']) || (isset($_SESSION['learner_authorised']) && $_SESSION['learner_authorised'] === true)) { ?>
              <li><a href="profile.php">Profile</a></li>
            <?php } ?>
            <li><a href="shoppingCart.php">Shopping Cart <i class="fa fa-shopping-cart fa-lg"></i></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_COOKIE['learner_id']) || (isset($_SESSION['learner_authorised']) && $_SESSION['learner_authorised'] === true)) { ?>
              <li>
                <a id="profile-a" href="profile.php">
                  <img id="profile" src="learner_profile/<?php if (isset($_SESSION['learner']['profile'])) echo $_SESSION['learner']['profile']; ?>" alt="Profile image">
                </a>
              </li>
            <?php } else { ?>
              <li>
                <a class="btn btn-primary" href="register_login.php"><i class="fa fa-sign-in"></i> Register Now</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>