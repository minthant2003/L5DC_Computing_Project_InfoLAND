<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InfoLAND | Online Learning Platform</title>
  <link rel="shortcut icon" href="images/tabicon.ico" type="image/x-icon" />

  <?php include("cssExternal.html"); ?>
</head>
<body>
  <?php include("loader.html"); ?>

  <div id="wrapper">
    <?php include("topbar_header.php"); ?>

    <section class="grey section">
      <div class="container">
        <div class="row">
          <div id="content" class="col-md-12 col-sm-12 col-xs-12">
            <div class="blog-wrapper">
              <div class="row second-bread">
                <div class="col-md-6 text-left">
                  <h1>Page Not Found</h1>
                </div>
                <div class="col-md-6 text-right">
                  <div class="bread">
                    <ol class="breadcrumb">
                      <li><a href="index.php">Home</a></li>
                      <li class="active">404</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <div class="blog-wrapper">
              <div class="blog-desc notfound text-center">
                <h3>404</h3>
                <p class="lead">The page you are looking for no longer exists. Perhaps you can return<br> back to the
                  site's homepage and see if you can find what you are looking for. Or, you can try finding<br> it with
                  the information below.</p>
                <a href="index.php" class="btn btn-default">Back to homepage</a>
                <hr class="invis">
              </div>
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