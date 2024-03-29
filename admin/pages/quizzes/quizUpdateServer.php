<?php
    require "../../db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $quizID = $_POST['id'];
        $quest = $_POST['quest'];
        $ans = $_POST['ans'];
        $opts = json_decode($_POST['opts'], true);
        
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