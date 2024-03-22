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
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $category = $_POST['category'];
            if (isset($_POST['entry_LP'])) $entry_LP = $_POST['entry_LP'];
            $goal_LP = $_POST['goal_LP'];
            if (isset($_POST['price'])) $price = $_POST['price'];
            $quizzes = json_decode($_POST['quizzes'], true);

            $sql = "SELECT * FROM course WHERE Name=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $name);
            mysqli_stmt_execute($stmt);

            // Unique Course Name
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) >= 1) {
                $response['msg'] = "Please select another Course Name.";
                echo json_encode($response);
            } else {
                // Free or Paid
                if (isset($entry_LP) && isset($price)) {
                    $sql = "INSERT INTO course (Name, Description, Category, Entry_LP, Goal_LP, Price, Syllabus, Image)
                            VALUES (?,?,?,?,?,?,?,?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "sssiidss", $name, $desc, $category, $entry_LP, $goal_LP, $price, $syllabusName, $imgName);
                } else {
                    $sql = "INSERT INTO course (Name, Description, Category, Goal_LP, Syllabus, Image)
                            VALUES (?,?,?,?,?,?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "sssiss", $name, $desc, $category, $goal_LP, $syllabusName, $imgName);
                }
    
                // Insert into Course table (Success)
                if (mysqli_stmt_execute($stmt)) {
                    move_uploaded_file($syllabusTmp, "../../../course_syllabus/" . $syllabusName);
                    move_uploaded_file($imgTmp, "../../../course_img/" . $imgName);

                    $sql = "SELECT * FROM course WHERE Name=?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $name);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $course = mysqli_fetch_assoc($result);

                    $courseId = $course['Course_ID'];
                    foreach ($quizzes as $quiz) {
                        $quest = $quiz['quest'];
                        $ans = $quiz['ans'];
                        $opts = $quiz['opts'];

                        $sql = "INSERT INTO quiz (Question, Answer, Course_ID)
                                VALUES (?,?,?)";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "ssi", $quest, $ans, $courseId);

                        // Insert into Quiz table (Success)
                        if (mysqli_stmt_execute($stmt)) {
                            $sql = "SELECT * FROM quiz WHERE Question=?";
                            $stmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_bind_param($stmt, "s", $quest);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $quiz = mysqli_fetch_assoc($result);

                            $quizId = $quiz['Quiz_ID'];
                            foreach ($opts as $opt) {
                                $text = $opt['text'];

                                $sql = "INSERT INTO quiz_options (Option_text, Quiz_ID)
                                        VALUES (?,?)";
                                $stmt = mysqli_prepare($conn, $sql);
                                mysqli_stmt_bind_param($stmt, "si", $text, $quizId);

                                // Insert into Quiz_options table (Success)
                                mysqli_stmt_execute($stmt);
                            }
                        }
                    }
                    
                    $response['msg'] = "The Course is successfully added.";
                    $response['success'] = true;
                    echo json_encode($response);
                }
            }
        }
    }

    mysqli_close($conn);