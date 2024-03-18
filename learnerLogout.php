<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === "GET") {        
        // Unset Cookie and Session of Remembered learner (Remember me)
        if (isset($_COOKIE['learner_id']) && $_SESSION['learner_authorised'] === true) {
            setcookie("learner_id", "", time() - 60*60, "/");            

            session_unset();
            session_destroy();

            $response['msg'] = "Logging out is successful. Please wait for a moment.";
            $response['success'] = true;
        }
        
        // Unset Session of the authorised learner
        elseif (empty($_COOKIE['learner_id']) && isset($_SESSION['learner']) && $_SESSION['learner_authorised'] === true) {
            session_unset();
            session_destroy();

            $response['msg'] = "Logging out is successful. Please wait for a moment.";
            $response['success'] = true;
        }

        // Check unauthorised learner
        elseif (empty($_SESSION['learner']) && empty($_SESSION['learner_authorised'])) {
            $response['msg'] = "Register or Login first.";
        }

        echo json_encode($response);
    }

    // Clear Server side data