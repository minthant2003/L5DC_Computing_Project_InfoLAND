<?php
    require "db_config.php";

    // Learner ID from Query String
    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id']) && isset($_GET['success'])) {
        $learnerID = $_GET['id'];
        $success = $_GET['success'];
        
        $sql = "SELECT * FROM enroll
                INNER JOIN course ON enroll.Course_ID = course.Course_ID
                WHERE enroll.Learner_ID=? AND enroll.Success=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $learnerID, $success);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        // Records found or Not
        if (mysqli_num_rows($result) > 0) {
            $courses = [];

            while ($course = mysqli_fetch_assoc($result)) {
                $courses[] = $course;
            }
            $response['courses'] = $courses;
            $response['hasRecords'] = true;
            echo json_encode($response);
        } else {
            // Enrolled Courses case or Completed Courses case
            if ((int) $success === 0) {
                $response['msg'] = "No Enrolled Courses yet.";
                echo json_encode($response);
            } else {
                $response['msg'] = "No Completed Courses yet.";
                echo json_encode($response);
            }
        }
    }

    mysqli_close($conn);