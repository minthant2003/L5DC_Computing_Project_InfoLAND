<?php
    session_start();
    require "../../db_config.php";

    header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        
        $sql = "SELECT * FROM admin WHERE Username=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $uname);
        mysqli_stmt_execute($stmt);
        
        // Check the Username in the System
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) === 1) {
            $admin = mysqli_fetch_assoc($result);
            // Verify the hashed Password
            if (password_verify($pass, $admin['Password'])) {
                $response['msg'] = "Successfully logged-in. Please wait for a moment.";
                $response['success'] = true;

                // Authorised admin
                $_SESSION['admin_authorised'] = true;
                $_SESSION['admin'] = [
                    "id" => $admin['Admin_ID'],
                    "uname" => $admin['Username'],
                    "fname" => $admin['Fullname'],
                    "email" => $admin['Email'],
                    "profile" => $admin['Profile']
                ];
            } else {
                $response['pass'] = "Password is not correct.";
            }
        } else {
            $response['uname'] = "Username is not correct.";
        }

        echo json_encode($response);
    }

    mysqli_close($conn);