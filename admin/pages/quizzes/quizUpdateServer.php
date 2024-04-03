<?php
    require "../../db_config.php";

    // Method for Same quiz -> Update, Not Same quiz -> Not Update
    function checkSameQuiz ($result, $id) {
        $quizResult = $result;
        $oldQuizID = $id;

        $quiz = mysqli_fetch_assoc($quizResult);
        $newQuizID = $quiz['Quiz_ID'];

        if ((int) $oldQuizID !== $newQuizID) {
            return false;
        }
        return true;
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $quizID = $_POST['id'];
        $quest = $_POST['quest'];
        $ans = $_POST['ans'];
        $opts = json_decode($_POST['opts'], true);
        
        // Validate whether the Question is Unique (with Database)
        $sql = "SELECT * FROM quiz WHERE Question=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $quest);
        mysqli_stmt_execute($stmt);
        $quizResult = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($quizResult) === 1 && !checkSameQuiz($quizResult, $quizID)) {
            $response['msg'] = "The Question already exits in the System. Please choose the another one.";
            echo json_encode($response);

            mysqli_close($conn);
            exit;
        }
                
        // Update Quiz data
        $sql = "UPDATE quiz SET Question=?, Answer=? WHERE Quiz_ID=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssi", $quest, $ans, $quizID);

        if (mysqli_stmt_execute($stmt)) {
            foreach ($opts as $opt) {
                $optID = $opt['id'];
                $optText = $opt['text'];
                // Update Options data
                $sql = "UPDATE quiz_options SET Option_text=? WHERE Option_ID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "si", $optText, $optID);
                mysqli_stmt_execute($stmt);
            }

            $response['msg'] = "Updating is Successful. Please wait for a moment.";
            $response['success'] = true;
            echo json_encode($response);
        }
    }

    mysqli_close($conn);