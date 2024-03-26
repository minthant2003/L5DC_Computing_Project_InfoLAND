<?php
    require "../../db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_FILES)) {
        $syllabusName = $_FILES['syllabus']['name'];
        $syllabusTmp = $_FILES['syllabus']['tmp_name'];
        $imgName = $_FILES['img']['name'];
        $imgTmp = $_FILES['img']['tmp_name'];
        $imgSize = $_FILES['img']['size'];

        // Validation for Syllabus
        $syllabusExt = strtolower(pathinfo($syllabusName, PATHINFO_EXTENSION));
        if ($syllabusExt !== "pdf") {
            $response['syllabus'] = "Course Syllabus is valid only for .pdf.";
        }

        // Validation for Image
        $valid = ['jpeg', 'jpg', 'png'];
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $max_size = 1 * 1024 * 1024;

        if (!in_array($imgExt, $valid)) {
            $response['img'] = "Course Image is valid only for .jpeg, .jpg, .png.";
        } elseif ($imgSize > $max_size) {
            $response['img'] = "Maximum Course Image size is 1MB.";
        }

        // Filter the validation messages
        if (isset($response) && is_array($response)) {
            echo json_encode($response);
        } else {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $category = $_POST['category'];
            if (isset($_POST['entry_LP'])) $entry_LP = $_POST['entry_LP'];
            $goal_LP = $_POST['goal_LP'];
            if (isset($_POST['price'])) $price = $_POST['price'];

            // To Remove the old files
            $sql = "SELECT * FROM course WHERE Course_ID=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) === 1) {
                $course = mysqli_fetch_assoc($result);
                $oldSyllabus = $course['Syllabus'];
                $oldImg = $course['Image'];
            }

            // Paid or Free
            if (isset($entry_LP) && isset($price)) {
                $sql = "UPDATE course SET Name=?, Description=?, Category=?, Entry_LP=?, Goal_LP=?, Price=?, Syllabus=?, Image=?
                        WHERE Course_ID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sssiidssi", $name, $desc, $category, $entry_LP, $goal_LP, $price, $syllabusName, $imgName, $id);
            } else {
                $entry_LP = 0;
                $price = 0;

                $sql = "UPDATE course SET Name=?, Description=?, Category=?, Entry_LP=?, Goal_LP=?, Price=?, Syllabus=?, Image=?
                        WHERE Course_ID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sssiidssi", $name, $desc, $category, $entry_LP, $goal_LP, $price, $syllabusName, $imgName, $id);
            }

            // Update the Course Info (Success or Fail)
            if (mysqli_stmt_execute($stmt)) {
                unlink("../../../course_syllabus/" . $oldSyllabus);
                unlink("../../../course_img/" . $oldImg);
                move_uploaded_file($syllabusTmp, "../../../course_syllabus/" . $syllabusName);
                move_uploaded_file($imgTmp, "../../../course_img/" . $imgName);
                
                $response['msg'] = "Updating is successful. Please wait for a moment.";
                $response['success'] = true;
                echo json_encode($response);
            } else {
                $response['msg'] = "Updating is not successful. Please try again.";
                echo json_encode($response);
            }
        }
    }

    mysqli_close($conn);