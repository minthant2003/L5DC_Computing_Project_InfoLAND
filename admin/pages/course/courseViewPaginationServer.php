<?php
    require "../../db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['current'])
        && (isset($_GET['param']) || isset($_GET['category']) || isset($_GET['price']))) {

        $current = $_GET['current'];

        // Dataset
        if (isset($_GET['param'])) {
            $sql = "SELECT * FROM course";
            $stmt = mysqli_prepare($conn, $sql);
        } elseif (isset($_GET['category']) && !isset($_GET['price'])) {
            $category = $_GET['category'];

            $sql = "SELECT * FROM course WHERE Category=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $category);
        } elseif (!isset($_GET['category']) && isset($_GET['price'])) {
            $price = $_GET['price'];
            $zero = 0;

            $sql = ($price === "free") ? "SELECT * FROM course WHERE Price=?" : "SELECT * FROM course WHERE Price>?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "d", $zero);
        } elseif (isset($_GET['category']) && isset($_GET['price'])) {
            $category = $_GET['category'];
            $price = $_GET['price'];
            $zero = 0;

            $sql = ($price === "free") ? "SELECT * FROM course WHERE Category=? AND Price=?" 
                    : "SELECT * FROM course WHERE Category=? AND Price>?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sd", $category, $zero);
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Pagination upon Dataset
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            $courses = [];
            $limit = 5;
            $numPages = ceil($numRows / $limit);
            $startIndex = $limit * ($current - 1);

            if ($current >= 1 && $current <= $numPages) {
                if (isset($_GET['param'])) {
                    $sql = "SELECT * FROM course LIMIT {$startIndex}, {$limit}";
                    $stmt = mysqli_prepare($conn, $sql);
                } elseif (isset($_GET['category']) && !isset($_GET['price'])) {
                    $category = $_GET['category'];
        
                    $sql = "SELECT * FROM course WHERE Category=? LIMIT {$startIndex}, {$limit}";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $category);
                } elseif (!isset($_GET['category']) && isset($_GET['price'])) {
                    $price = $_GET['price'];
                    $zero = 0;
        
                    $sql = ($price === "free") ? "SELECT * FROM course WHERE Price=? LIMIT {$startIndex}, {$limit}" 
                            : "SELECT * FROM course WHERE Price>? LIMIT {$startIndex}, {$limit}";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "d", $zero);
                } elseif (isset($_GET['category']) && isset($_GET['price'])) {
                    $category = $_GET['category'];
                    $price = $_GET['price'];
                    $zero = 0;
        
                    $sql = ($price === "free") ? "SELECT * FROM course WHERE Category=? AND Price=? LIMIT {$startIndex}, {$limit}" 
                            : "SELECT * FROM course WHERE Category=? AND Price>? LIMIT {$startIndex}, {$limit}";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "sd", $category, $zero);
                }
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
    
                while ($course = mysqli_fetch_assoc($result)) {
                    $courses[] = $course;
                }
    
                $response['courses'] = $courses;
                $response['numPages'] = $numPages;
                $response['hasRecords'] = true;
                echo json_encode($response);
            } else {
                $response['msg'] = "Page over Flow.";
                echo json_encode($response);
            }
        } else {
            $response['msg'] = "No Records found.";
            echo json_encode($response);
        }
    }

    mysqli_close($conn);