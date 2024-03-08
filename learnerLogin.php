<?php
    session_start();
    require("db_config.php");

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $uname = $_POST['uname_login'];
        $pass = $_POST['pass_login'];

        $sql = "SELECT * FROM learner WHERE Username=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $uname);
        mysqli_stmt_execute($stmt);
        
        // Check the Username in the System
        $result = mysqli_stmt_get_result($stmt);
        $learner = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) === 1) {
            // Verify the hashed Password
            if (password_verify($pass, $learner['Password'])) {
                $response['msg'] = "Successfully logged-in. Please wait for a moment.";
                $response['success'] = true;

                // Authorised learner
                $_SESSION['authorised'] = true;
                $_SESSION['learner'] = [
                    "id" => $learner['Learner_ID'],
                    "uname" => $learner['Username'],
                    "LP" => $learner['Personal_LP'],
                    "fname" => $learner['Fullname'],
                    "email" => $learner['Email'],
                    "profile" => $learner['Profile']
                ];
            } else {
                $response['pass'] = "Password is not correct.";
            }

        } else {
            $response['uname'] = "Username is not correct.";
        }

        // Remember me implementation
        if (isset($_POST['remember']) && $_SESSION['authorised']) {
            setcookie("learner_id", $learner['Learner_ID'], time() + 24*60*60*5, "/");
        }

        echo json_encode($response);

    }

    mysqli_close($conn);