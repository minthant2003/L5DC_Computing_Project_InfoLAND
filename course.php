<?php
  session_start();
  require "db_config.php";

  if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM course WHERE Course_ID=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {
      $course = mysqli_fetch_assoc($result);
    }
  }
?>
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

    <section class="grey page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-left">
            <h1><?php if (isset($course)) echo $course['Name']; ?></h1>
          </div>
          <div class="col-md-6 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="coursesView.php">Courses</a></li>
                <li class="active"><?php if (isset($course)) echo $course['Name']; ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="white section">
      <div class="container">
        <?php if (isset($course)) { ?>
          <div class="row">
            <div id="course-left-sidebar" class="col-md-4">
              <div class="course-image-widget">
                <img src="course_img/<?php if (isset($course)) echo $course['Image']; ?>" alt="course" class="img-responsive">
              </div>
              <div class="course-meta">
                <p class="course-category">Category : <span><?php if (isset($course)) echo $course['Category']; ?></span></p>
                <hr>              
                <p class="course-prize">Completion : <i class="fa fa-trophy"></i> <i class="fa fa-certificate"></i> Certificate</p>              
              </div>
              <div class="course-button">
                <a href="course.php" data-id="<?php if (isset($course)) echo $course['Course_ID']; ?>"
                  class="btn btn-primary btn-block">ADD TO SHOPPING CART <i class="fa fa-shopping-cart"></i></a>
              </div>
            </div>
            <div id="course-content" class="col-md-8">
              <div class="course-description">
                <small>Course Price: <span>£ <?php if (isset($course)) echo $course['Price']; ?></span></small>
                <small>Entry LP : <span><?php if (isset($course)) echo $course['Entry_LP']; ?></span></small>
                <small>Goal LP : <span><?php if (isset($course)) echo $course['Goal_LP']; ?></span></small>
                <h3 class="course-title"><?php if (isset($course)) echo $course['Name']; ?></h3>
                <p><?php if (isset($course)) echo $course['Description']; ?></p>
              </div>
              <hr class="invis">
              <div id="reviews" class="feedbacks">
                <p>
                  <a class="btn btn-default btn-block" role="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    What Our Learners said? (3 Comments)
                  </a>
                </p>
                <div class="collapse" id="collapseExample">
                  <div class="well">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="upload/xstudent_01.png.pagespeed.ic.756JwMcqdq.png" alt="student1">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">John DOE</h4>
                        <div class="rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                          commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                          nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="upload/xstudent_02.png.pagespeed.ic.y-PM-y4pVj.png" alt="student2">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Amanda FOXOE</h4>
                        <div class="rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                          commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                          nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="upload/xstudent_03.png.pagespeed.ic.uCQY3WNMCJ.png" alt="student3">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Mark BOBS</h4>
                        <div class="rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                          commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                          nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="text-success">
                  *** this section should be comment form submitted to the database for review on each course by learners. ***
                </div>

              </div>
            </div>
          </div>
        <?php } else { ?>
          <div class="row">
            <h4>Course does not exit. Course ID : <?php if (isset($_GET['id'])) echo $_GET['id']; ?></h4>
          </div>
        <?php } ?>
      </div>
    </section>

    <?php include("popularCourses.php"); ?>

    <?php include("footer_copyright.php"); ?>
  </div>

  <?php include("jsExternal.html"); ?>
</body>
</html>

<?php mysqli_close($conn); ?>