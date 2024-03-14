<?php
    session_start();
    require "db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET["courses"]) && is_array($_GET["courses"])) {
        $id_arr = $_GET["courses"];
        $courses = [];

        foreach ($id_arr as $id) {
            $sql = "SELECT * FROM course WHERE Course_ID=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) === 1) {
                $course = mysqli_fetch_assoc($result);
                $courses[] = $course;
            }
        }

        echo json_encode($courses);
    }

    mysqli_close($conn);