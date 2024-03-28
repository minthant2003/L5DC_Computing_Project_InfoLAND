<?php
    require "db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
        $courseID = $_GET['id'];
        $randQuizzes = [];

        $sql = "SELECT * FROM quiz WHERE Course_ID=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $courseID);
        mysqli_stmt_execute($stmt);

        // All Quizzes of the specific Course
        $quizzesResult = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($quizzesResult) > 0) {
            $quizzes = [];

            while ($tmpQuiz = mysqli_fetch_assoc($quizzesResult)) {
                $quiz = [];
                $quiz['id'] = $tmpQuiz['Quiz_ID'];
                $quiz['quest'] = $tmpQuiz['Question'];
                $quiz['ans'] = $tmpQuiz['Answer'];

                $quizID = $tmpQuiz['Quiz_ID'];

                $sql = "SELECT * FROM quiz_options WHERE Quiz_ID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "i", $quizID);
                mysqli_stmt_execute($stmt);

                // All Options of the specific Quiz
                $optsResult = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($optsResult) > 0) {
                    $opts = [];

                    while ($tmpOpt = mysqli_fetch_assoc($optsResult)) {
                        $opt = [];
                        $opt['id'] = $tmpOpt['Option_ID'];
                        $opt['text'] = $tmpOpt['Option_text'];
                        $opts[] = $opt;
                    }
                    $quiz['opts'] = $opts;
                    $quizzes[] = $quiz;
                }
            }

            // Generate Random Quizzes
            $randIndexArr = array_rand($quizzes, 3);
            for ($i = 0; $i < sizeof($randIndexArr); $i++) {
                $randQuizzes[] = $quizzes[$randIndexArr[$i]];
            }

            echo json_encode($randQuizzes);
        }
    }

    mysqli_close($conn);

    // Retrieve all Quizzes -> Take 3 Random Quizzes from the dataset    