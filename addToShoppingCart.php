<?php
    session_start();
    require "db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
        // Course ID to check Entry LP
        $id = $_GET['id'];

        $sql = "SELECT * FROM course WHERE Course_ID=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) === 1) {
          $course = mysqli_fetch_assoc($result);
        }
        
        // Check whether Logged in or Registered
        if (isset($_SESSION['learner_authorised']) && $_SESSION['learner_authorised'] === true && isset($_SESSION['learner'])) {
            // Check Entry LP
            if ($_SESSION['learner']['LP'] >= $course['Entry_LP']) {
                $response['msg'] = "Added to the Shopping Cart.";
                $response['valid'] = true;

                echo json_encode($response);
            } else {
                $response['msg'] = "Require more LP. Entry LP is " . $course['Entry_LP'] . ".";

                echo json_encode($response);
            }
        } else {
            $response['msg'] = "Please Login or Register first.";
            $response['need_auth'] = true;

            echo json_encode($response);
        }
    }

    mysqli_close($conn);

    // case 1. Authorised or Unauthorised
    // case 2. Qualified enough for the Desired Course