<?php 
  session_start();
  require "db_config.php";

  if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
    $learnerID = $_SESSION['learner']['id'];
    $courseID = $_GET['id'];

    $sql = "SELECT * FROM course INNER JOIN enroll 
            ON course.Course_ID = enroll.Course_ID 
            WHERE enroll.Learner_ID=? AND enroll.Course_ID=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $learnerID, $courseID);
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
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      let quizContainer = document.getElementById('quiz-container');

      let params = new URLSearchParams(window.location.search);
      let courseID = params.get('id');

      // Method for Random Quizzes
      const renderQuizzes = async () => {
        let parser = new DOMParser();
        let counter = 0;

        quizContainer.innerHTML = "";

        let response = await fetch(`renderRandomQuizzes.php?id=${courseID}`, { method: "GET" });
        let randQuizzes = await response.json();

        randQuizzes.forEach(quiz => {
          counter++;
          let nodeString = `
            <div class="quiz-wrapper" data-id="${quiz.id}">
              <h4>Q: ${quiz.quest}</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-primary">
                    <div class="panel-body">
                      <div class="radio">
                        <label>
                          <input name="opt_${counter}" value="a" type="radio" required>
                          ${quiz.opts[0].text}
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="opt_${counter}" value="b" type="radio">
                          ${quiz.opts[1].text}
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="opt_${counter}" value="c" type="radio">
                          ${quiz.opts[2].text}
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

          quizContainer.append(nodeHTML);
        });
      }

      // Page Loaded
      renderQuizzes();

      // Take the Quizzes
      let quizzesForm = document.getElementById('quizzes-form');

      quizzesForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        let takeQuizzes = {};
        let quizzesID = [];
        let choices = [];
        let quizzesHTMLCollection = quizContainer.children;
        let quizzesDivArr = [...quizzesHTMLCollection];

        quizzesDivArr.forEach(div => {
          let quizID = div.dataset.id;
          let choice = div.querySelector('input[type="radio"]:checked').value;
          quizzesID.push(quizID);
          choices.push(choice);
        });

        takeQuizzes.courseID = courseID;
        takeQuizzes.quizzesID = quizzesID;
        takeQuizzes.choices = choices;

        let response = await fetch(`takeQuizzesServer.php?takeQuizzes=${JSON.stringify(takeQuizzes)}`, { method: "GET" });
        let res = await response.json();
        
        if (res.msg) alert(res.msg);
        if (res.fail) renderQuizzes();
        if (res.success) setTimeout(() => window.location.href = "profile.php", 1000);
      });
    });
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
            <h1>Course & Quizzes</h1>
          </div>
          <div class="col-md-6 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li class="active">Course & Quizzes</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="white section">
      <div class="container">
        <div class="row">
          <div id="course-content" class="col-md-8">
            <div class="course-description">
              <small>Course Syllabus for : <span><a href="course.php?id=<?php if (isset($course)) echo $course['Course_ID']; ?>">
                <?php if (isset($course)) echo $course['Name']; ?></a></span> </small>
              <h3 class="course-title">Course Syllabus</h3>
              <!--  -->
              <!--  -->
              <a href="takeCourse&Quizzes.php">Click Here to get the Full Course for Web Design & Development.</a>
              <!--  -->
              <!--  -->
              <hr class="invis">

              <?php if (isset($course) && $course['Success'] === 0) { ?>
                <small>Quizzes for : <span><a href="course.php?id=<?php if (isset($course)) echo $course['Course_ID']; ?>">
                  <?php if (isset($course)) echo $course['Name']; ?></a></span> </small>
                <form id="quizzes-form" action="takeCourse&Quizzes.php" method="post">
                  <h3 class="course-title">Quizzes</h3>
                  <div id="quiz-container">
                    <!-- Data Rendered by javascript -->


                    <!-- Data Rendered by javascript -->                  
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-default">Reset</button>
                </form>
              <?php } ?>
            </div>
          </div>
          <div id="course-left-sidebar" class="col-md-4">
            <div class="course-image-widget">
              <img src="course_img/<?php if (isset($course)) echo $course['Image']; ?>" alt="Course Image" class="img-responsive">
            </div>
            <div class="course-meta">
              <p class="course-category">Category : <?php if (isset($course)) echo $course['Category']; ?></p>
              <hr>              
              <p class="course-prize">Completion : <i class="fa fa-trophy"></i> <i class="fa fa-certificate"></i> Certificate</p>           
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
<?php mysqli_close($conn); ?>