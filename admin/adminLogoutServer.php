<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        // Clear Session data of authorised admin
        if (isset($_SESSION['admin']) && $_SESSION['admin_authorised'] === true) {
            unset($_SESSION['admin']);
            unset($_SESSION['admin_authorised']);

            $response['msg'] = "Signing out is successful.";
            $response['success'] = true;

            echo json_encode($response);
        }
    }