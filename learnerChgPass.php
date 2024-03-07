<?php
    session_start();
    require "db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $OTP = $_POST['OTP'];
        $newPass = $_POST['pass_chg'];
        $newConPass = $_POST['con_pass_chg'];

        // Check whether OTP has been sent
        if (isset($_SESSION['tmp_OTP']) && isset($_SESSION['tmp_email'])) {
            // Validation for OTP
            if ($OTP !== $_SESSION['tmp_OTP']) {
                $response['otp'] = "OTP is not correct.";
            }

            // Validation for new password and new confirm password
            if (strlen($newPass) < 8) {
                $response['newPass'] = "Password must contain at least 8 characters.";
            } elseif (!preg_match("/(?=.*[a-z])/", $newPass)) {
                $response['newPass'] = "Password must contain at least one Lower case.";
            } elseif (!preg_match("/(?=.*[A-Z])/", $newPass)) {
                $response['newPass'] = "Password must contain at least one Upper case.";
            } elseif (!preg_match("/(?=.*\d)/", $newPass)) {
                $response['newPass'] = "Password must contain at least one Digit.";
            } elseif (!preg_match("/(?=.*[\W_])/", $newPass)) {
                $response['newPass'] = "Password must contain at least one Special character.";
            } elseif (preg_match("/[\s]/", $newPass)) {
                $response['newPass'] = "Password must not contain any Whitespace.";
            }
            if ($newConPass !== $newPass) {
                $response['newConPass'] = "Re-enter Confirm password.";
            }

            // Filter validation messages
            if (isset($response) && is_array($response)) {
                echo json_encode($response);
            } else {
                $hash = password_hash($newPass, PASSWORD_DEFAULT);
                $email = $_SESSION['tmp_email'];

                $sql = "UPDATE learner SET Password=? WHERE Email=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ss", $hash, $email);
                
                // Success or Fail
                if (mysqli_stmt_execute($stmt)) {
                    $response['chgMsg'] = "Update is successful. Please Login again.";
                    $response['success'] = true;

                    // Clear data of different scenario and Tmp data
                    setcookie("learner_id", "", time() -  60*60, "/");
                    $_SESSION['authorised'] = false;
                    unset($_SESSION['learner']);
                    unset($_SESSION['tmp_OTP']);
                    unset($_SESSION['tmp_email']);
                } else {
                    $response['chgMsg'] = "Update is not successful. Please try again later.";
                }
            }
        } else {
            $response['chgMsg'] = "Send OTP to Email first.";
        }

        echo json_encode($response);
    }

    mysqli_close($conn);