<?php
    header("Content-type: image/png");

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['learnerName']) && isset($_GET['courseName'])) {
        $learnerName = $_GET['learnerName'];
        $courseName = $_GET['courseName'];
        
        // Image Stream & parameters
        $certificate = imagecreatefrompng("certificateTemplate/certificateTemplate.png");
        $certificateWidth = imagesx($certificate);
        $textColor = imagecolorallocate($certificate, 166, 144, 2);
        $font = "certificateFonts/ITCEDSCR.TTF";

        // Write Learner name
        $learnerNameBox = imagettfbbox(80, 0, $font, $learnerName);
        $lower_left_x = $learnerNameBox[0];
        $lower_right_x = $learnerNameBox[2];
        $learnerNameWidth = $lower_right_x - $lower_left_x;
        $learnerNameStart = (int) floor(($certificateWidth - $learnerNameWidth) / 2);
        imagettftext($certificate, 80, 0, $learnerNameStart, 680, $textColor, $font, $learnerName);
        
        // Write Course name
        $courseNameBox = imagettfbbox(80, 0, $font, $courseName);
        $lower_left_x = $courseNameBox[0];
        $lower_right_x = $courseNameBox[2];
        $courseNameWidth = $lower_right_x - $lower_left_x;
        $courseNameStart = (int) floor(($certificateWidth - $courseNameWidth) / 2);
        imagettftext($certificate, 80, 0, $courseNameStart, 950, $textColor, $font, $courseName);
        
        // Create image from image stream
        imagepng($certificate);
        imagedestroy($certificate);        
    }