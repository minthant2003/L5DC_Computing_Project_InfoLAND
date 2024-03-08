<?php
    session_start();
    require "db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $uname = $_POST['pro_edit_uname'];
        $pass = $_POST['pro_edit_pass'];
        $con_pass = $_POST['pro_edit_con_pass'];
        $fname = $_POST['pro_edit_fname'];
        $email = $_POST['pro_edit_email'];
        $profile_name = $_FILES['pro_edit_file']['name'];
        $profile_tmp = $_FILES['pro_edit_file']['tmp_name'];
        $profile_size = $_FILES['pro_edit_file']['size'];

        // Validation for uname
        $sql = "SELECT * FROM learner WHERE Username=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $uname);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) >= 1) {
            $response['uname'] = "Pick another Username.";
        }    

        // Validation for password and confirm password
        if (strlen($pass) < 8) {
            $response['pass'] = "Password must contain at least 8 characters.";
        } elseif (!preg_match("/(?=.*[a-z])/", $pass)) {
            $response['pass'] = "Password must contain at least one Lower case.";
        } elseif (!preg_match("/(?=.*[A-Z])/", $pass)) {
            $response['pass'] = "Password must contain at least one Upper case.";
        } elseif (!preg_match("/(?=.*\d)/", $pass)) {
            $response['pass'] = "Password must contain at least one Digit.";
        } elseif (!preg_match("/(?=.*[\W_])/", $pass)) {
            $response['pass'] = "Password must contain at least one Special character.";
        } elseif (preg_match("/[\s]/", $pass)) {
            $response['pass'] = "Password must not contain any Whitespace.";
        }
        if ($con_pass !== $pass) {
            $response['con_pass'] = "Re-enter Confirm password.";
        }

        // Validation for fullname
        if (!preg_match("/^[a-zA-Z\s]+$/", $fname)) {
            $response['fname'] = "Fullname must contain only Letters and Whitespace.";
        }

        // Validation for profile
        $valid = ['jpeg', 'jpg', 'png'];
        $extension = strtolower(pathinfo($profile_name, PATHINFO_EXTENSION));
        $max_size = 1 * 1024 * 1024;

        if (!in_array($extension, $valid)) {
            $response['profile'] = "Valid only for .jpeg, .jpg, .png.";
        } elseif ($profile_size > $max_size) {
            $response['profile'] = "Maximum image size is 1MB.";
        }

        // Filter validation messages
        if (isset($response) && is_array($response)) {
            echo json_encode($response);
        } else {
            // Get the ID of the authorised learner
            $id = $_SESSION['learner']['id'];
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            
            $sql = "UPDATE learner 
                    SET Username=?, Password=?, Fullname=?, Email=?, Profile=? 
                    WHERE Learner_ID=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssi", $uname, $hash, $fname, $email, $profile_name, $id);
       
            // Success or Fail
            if (is_uploaded_file($profile_tmp) && mysqli_stmt_execute($stmt)) {
                unlink("learner_profile/" . $_SESSION['learner']['profile']);
                move_uploaded_file($profile_tmp, "learner_profile/{$profile_name}");

                $response['msg'] = "Updating is successful. Please wait for a moment.";
                $response['success'] = true;

                // Update Old Session data
                $_SESSION['authorised'] = true;
                $_SESSION['learner'] = [
                    "id" => $id,
                    "uname" => $uname,
                    "LP" => $_SESSION['learner']['LP'],
                    "fname" => $fname,
                    "email" => $email,
                    "profile" => $profile_name
                ];

                echo json_encode($response);  
            } else {
                $response['msg'] = "Updating is not successful. Please try again.";   
                
                echo json_encode($response);  
            }
        }
    }

    mysqli_close($conn);