<?php
    session_start();
    require "db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['takeQuizzes'])) {
        $takeQuizzes = json_decode($_GET['takeQuizzes'], true);
        $marks = 0;

        $learnerID = $_SESSION['learner']['id'];
        $courseID = $takeQuizzes['courseID'];
        $quizzes = $takeQuizzes['quizzesID'];
        $choices = $takeQuizzes['choices'];

        // Check whether the Quizzes are Right
        for ($i = 0; $i < sizeof($quizzes); $i++) {
            $quizID = $quizzes[$i];
            $choice = $choices[$i];

            $sql = "SELECT * FROM quiz WHERE Quiz_ID=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $quizID);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) === 1) {
                $quiz = mysqli_fetch_assoc($result);
                $ans = $quiz['Answer'];

                if ($ans === $choice) $marks++;
            }
        }

        // Qualified or Disqualified
        if ($marks === 3) {
            $success = 1;

            // Update Success attribute to 1
            $sql = "UPDATE enroll SET Success=? WHERE Learner_ID=? AND Course_ID=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "iii", $success, $learnerID, $courseID);

            if (mysqli_stmt_execute($stmt)) {
                // Get Goal LP of the course
                $sql = "SELECT * FROM course WHERE Course_ID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "i", $courseID);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) === 1) {
                    $course = mysqli_fetch_assoc($result);
                    $goalLP = $course['Goal_LP'];

                    // Increment (old += value -> NEW)
                    $learnerLP = $_SESSION['learner']['LP'];
                    $learnerLP += $goalLP;

                    // Update Session data
                    $_SESSION['learner']['LP'] = $learnerLP;
                    $newLearnerLP = $_SESSION['learner']['LP'];

                    // Update Database data
                    $sql = "UPDATE learner SET Personal_LP=? WHERE Learner_ID=?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "ii", $newLearnerLP, $learnerID);
                    
                    if (mysqli_stmt_execute($stmt)) {
                        $response['msg'] = "Congratulations! You can take the Certificate now.";
                        $response['success'] = true;
                        echo json_encode($response);
                    }
                }
            }
        } else {
            $response['msg'] = "Please try again. You got {$marks} out of 3 marks.";
            $response['fail'] = true;
            echo json_encode($response);
        }
    }

    mysqli_close($conn);
    
    // 1. Check Success or Fail
    // 2. Success = 1
    // 3. Learner LP += Goal LP
    //      3.1 Update Session data
    //      3.2 Update Database data