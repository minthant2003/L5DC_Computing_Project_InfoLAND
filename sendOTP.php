<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require "vendor/autoload.php";

    session_start();
    require "db_config.php";

    function generateOTP() {
        $OTP = "";
        for ($i = 0; $i < 4; $i++) {
            $OTP .= (string)rand(0, 9);
        }
        return $OTP;
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {        
        $email = $_POST['email'];

        $sql = "SELECT * FROM learner WHERE Email=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $learner = mysqli_fetch_assoc($result);

        // Check registered Email for changing Password
        if (mysqli_num_rows($result) >= 1) {                        
            try {
                $OTP = generateOTP();                

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
                $mail->addAddress($learner['Email'], $learner['Fullname']);
        
                // Content
                $mail->isHTML(true);
                $mail->Subject = "OTP from InfoLAND learning Platform.";
                $mail->Body = "<h3>OTP is : </h3>";
                $mail->Body .= "<h1>{$OTP}</h1>";
                $mail->Body .= "<br/>";
                $mail->Body .= "<p>Please do not share this OTP to anyone.</p>";        

                // Fail or Success
                if ($mail->send()) {
                    $response['mailMsg'] = "Check Mailbox. OTP has been sent.";

                    $_SESSION['tmp_email'] = $learner['Email'];
                    $_SESSION['tmp_OTP'] = $OTP;
                } else {
                    $response['mailMsg'] = "Mailing is not successful. Please try again.";
                }
            } catch (Exception $e) {
                $response['mailMsg'] = $e->getMessage();
            }
        } else {
            $response['email'] = "Enter Registered Email.";
        }

        echo json_encode($response);
    }
    
    mysqli_close($conn);

    // Session storage
    // 1. OTP -> For authentication
    // 2. tmp_email -> For changing New Password