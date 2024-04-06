<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require "vendor/autoload.php";

    session_start();
    require "db_config.php";

    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        // Certificate Parameters
        $courseID = $_GET['id'];
        $learnerID = $_SESSION['learner']['id'];
        $receiptEmail = $_SESSION['learner']['email'];
        $receiptFullname = $_SESSION['learner']['fname'];

        $sql = "SELECT * FROM course WHERE Course_ID=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $courseID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $course = mysqli_fetch_assoc($result);

        $courseName = $course['Name'];

        // Get the Dynamic Certificate
        $url = "http://localhost/Computing_Project/dynamicCertificate.php";
        $url .= "?learnerName=" . urlencode($receiptFullname) . "&courseName=" . urlencode($courseName);
        $certificateAttach = file_get_contents($url);

        try {
            $mail = new PHPMailer(true);
    
            // SMTP server config
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->SMTPAuth = true;
            $mail->Username = "";
            $mail->Password = "";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = "465";
    
            // Parameter
            $mail->setFrom("", "");
            $mail->addAddress($receiptEmail, $receiptFullname);
            $mail->addStringAttachment($certificateAttach, "certificate.png");
    
            // Content
            $mail->isHTML(true);
            $mail->Subject = "Certificate Awarding by InfoLAND";
            $mail->Body = "<h3>Certificate on Completion of {$courseName}</h3>";
            $mail->Body .= "<p>Heartfelt Congratulations to You, {$receiptFullname}!</p>";

            // Fail or Success
            if ($mail->send()) {
                // Mark as Certificate taken
                $certificate = 1;
                $sql = "UPDATE enroll SET Certificate=?
                        WHERE Learner_ID=? AND Course_ID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "iii", $certificate, $learnerID, $courseID);
                mysqli_stmt_execute($stmt);

                $response['mailMsg'] = "Check Mailbox. Certificate has been sent.";
                $response['success'] = true;
            } else {
                $response['mailMsg'] = "Mailing is not successful. Please try again.";
            }
        } catch (Exception $e) {
            $response['mailMsg'] = $e->getMessage();
        }
        echo json_encode($response);
    }

    mysqli_close($conn);