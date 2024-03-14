<?php
    session_start();
    require "db_config.php";

    header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $jsonString = file_get_contents('php://input');
        $courses_id = json_decode($jsonString, true);

        $learner_id = $_SESSION['learner']['id'];
        $date = date("Y-m-d");

        $sql = "INSERT INTO enroll (Learner_ID, Course_ID, Date) VALUES (?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);

        foreach ($courses_id as $course_id) {
           mysqli_stmt_bind_param($stmt, "iis", $learner_id, $course_id, $date);
           mysqli_stmt_execute($stmt);
        }

        $response['msg'] = "Enrolling is successful. Please wait for a moment.";
        $response['success'] = true;

        echo json_encode($response);
    }

    mysqli_close($conn);