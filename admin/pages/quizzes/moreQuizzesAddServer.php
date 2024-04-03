<?php
    require "../../db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $courseID = $_POST['courseID'];
        $quizzes = json_decode($_POST['quizzes'], true);
        $counter = 0;
        $quests = [];

        // Check whether Quiz Questions are Unique (Across Input Questions) 
        foreach ($quizzes as $quiz) {
            $quest = $quiz['quest'];
            $quests[] = $quest;
        }
        if (sizeof($quests) !== sizeof(array_unique($quests))) {
            $response['msg'] = "The Questions of the Quizzes must be Unique.";
            echo json_encode($response);

            mysqli_close($conn);
            exit;
        }

        // Check whether Quiz Questions are Unique (with Database)
        foreach ($quizzes as $quiz) {
            $counter++;
            $quest = $quiz['quest'];

            $sql = "SELECT * FROM quiz WHERE Question=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $quest);
            mysqli_stmt_execute($stmt);
            $quizResult = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($quizResult) === 1) {
                $response['msg'] = "The Question of Quiz Number {$counter} already exits in the System. Please choose the another one.";
                echo json_encode($response);

                mysqli_close($conn);
                exit;
            }
        }

        foreach ($quizzes as $quiz) {
            $quest = $quiz['quest'];
            $ans = $quiz['ans'];
            $opts = $quiz['opts'];                                           

            $sql = "INSERT INTO quiz (Question, Answer, Course_ID)
                    VALUES (?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssi", $quest, $ans, $courseID);

            // Insert into Quiz table (Success)
            if (mysqli_stmt_execute($stmt)) {
                $sql = "SELECT * FROM quiz WHERE Question=?"; // UNIQUE QUESTION FOR EACH QUIZ *
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $quest);
                mysqli_stmt_execute($stmt);
                $quizResult = mysqli_stmt_get_result($stmt);
                $quiz = mysqli_fetch_assoc($quizResult);

                $quizID = $quiz['Quiz_ID'];
                foreach ($opts as $opt) {
                    $text = $opt['text'];

                    $sql = "INSERT INTO quiz_options (Option_text, Quiz_ID)
                            VALUES (?,?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "si", $text, $quizID);

                    // Insert into Quiz_options table (Success)
                    mysqli_stmt_execute($stmt);
                }
            }
        }

        $response['msg'] = "More Quizzes have been successfully added. Please wait for a moment.";
        $response['success'] = true;
        echo json_encode($response);
    }

    mysqli_close($conn);

    // 1. Validate whether Quiz Questions are Unique
    // 2. Add quizzes to the Database