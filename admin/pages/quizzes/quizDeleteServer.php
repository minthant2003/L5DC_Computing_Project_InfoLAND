<?php
    require "../../db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
        $quizID = $_GET['id'];

        $sql = "DELETE FROM quiz WHERE Quiz_ID=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $quizID);

        if (mysqli_stmt_execute($stmt)) {
            $response['msg'] = "Deleting is Successful. Please wait for a moment.";
            $response['success'] = true;
            echo json_encode($response);
        }
    }

    mysqli_close($conn);