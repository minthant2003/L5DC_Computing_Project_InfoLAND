<?php
    session_start();
    require "db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['param'])) {
        $courses = [];
        $param = $_GET['param'];

        if ($param === "*") {
            $sql = "SELECT * FROM course";

            $stmt = mysqli_prepare($conn, $sql);
        } elseif ($param === "free") {
            // Free courses -> price = 0
            $param = 0;
            $sql = "SELECT * FROM course WHERE Price=?";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "d", $param);
        } else {
            // Certain category specified
            $sql = "SELECT * FROM course WHERE Category=?";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $param);
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Records found or not
        if (mysqli_num_rows($result) >= 1) {
            while ($course = mysqli_fetch_assoc($result)) {
                $courses[] = $course;
            }

            echo json_encode($courses);
        } else {
            $response['msg'] = "No Records found. Try another one.";
            $response['empty'] = true;

            echo json_encode($response);
        }
    }

    mysqli_close($conn);