<?php
    require "../../db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM course WHERE Course_ID=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) === 1) {
            $course = mysqli_fetch_assoc($result);
            $syllabus = $course['Syllabus'];
            $img = $course['Image'];

            // Delete the data from the Database
            $sql = "DELETE FROM course WHERE Course_ID=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);

            if (mysqli_stmt_execute($stmt)) {
                // Remove the Files from the Folder
                unlink("../../../course_syllabus/" . $syllabus);
                unlink("../../../course_img/" . $img);

                $response['msg'] = "The Course was successfully deleted.";
                $response['success'] = true;
                echo json_encode($response);
            }
        }
    }

    mysqli_close($conn);