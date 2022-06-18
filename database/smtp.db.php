<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require 'dbh.db.php';

if(isset($_POST["submit"])) {

    $emailTo = $_POST["email"];
    $code = uniqid(true);
    $query = mysqli_query($conn, "INSERT INTO resetPasswords (resetPasswordsCode, resetPasswordsEmail) VALUES ('$code', '$emailTo');");
    if(!$query) {
        exit("Error");
    }

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'YOUREMAIL@outlook.com';                //SMTP username | I use outlook because gmail doesnt work.
        $mail->Password   = 'YOUR PASSWORD';                        //SMTP password
        $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('SEND FROM THAT EMAIL', 'MyPelatologio');
        $mail->addAddress($emailTo);                                //Add a recipient
        $mail->addReplyTo('info@REPLY EMAIL.com', 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Your Password Reset Link';
        $mail->Body    = '
            <!DOCTYPE html>
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="x-apple-disable-message-reformatting">
                
                <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
                <!--[if mso]>
                    <style>
                        * {
                            font-family: "Roboto", sans-serif !important;
                        }
                    </style>
                <![endif]-->
            
                <!--[if !mso]>
                    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
                <![endif]-->
            
                <!-- Font-Awesome CDN Link 6.1.1 -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                
                <style>
                    html,
                    body {
                        margin: 0 auto !important;
                        padding: 0 !important;
                        height: 100% !important;
                        width: 100% !important;
                        font-family: "Roboto", sans-serif !important;
                        font-size: 14px;
                        margin-bottom: 10px;
                        line-height: 24px;
                        color:#8094ae;
                        font-weight: 400;
                    }
                    * {
                        -ms-text-size-adjust: 100%;
                        -webkit-text-size-adjust: 100%;
                        margin: 0;
                        padding: 0;
                    }
                    table,
                    td {
                        mso-table-lspace: 0pt !important;
                        mso-table-rspace: 0pt !important;
                    }
                    table {
                        border-spacing: 0 !important;
                        border-collapse: collapse !important;
                        table-layout: fixed !important;
                        margin: 0 auto !important;
                    }
                    table table table {
                        table-layout: auto;
                    }
                    a {
                        text-decoration: none;
                    }
                    img {
                        -ms-interpolation-mode:bicubic;
                    }

                    .reset-password-button {
                        background-color:#6576ff;
                        border-radius:4px;
                        color:#ffffff !important;
                        display:inline-block;
                        font-size:13px;
                        font-weight:600;
                        line-height:44px;
                        text-align:center;
                        text-decoration:none;
                        text-transform: uppercase;
                        padding: 0 25px;
                    }
                </style>
            
            </head>
            
            <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
                <center style="width: 100%; background-color: #f5f6fa;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
                        <tr>
                            <td style="padding: 40px 0;">
                                <table style="width:100%;max-width:620px;margin:0 auto;">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center; padding-bottom:25px">
                                                <p style="font-size: 18px; color: #6576ff; padding-top: 12px;">MyPelatologio</p>
                                            </td>
                                         </tr>
                                    </tbody>
                                </table>
                                <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                                    <tbody>
                                        <tr>
                                            <td style="text-align:center;padding: 30px 30px 15px 30px;">
                                                <h2 style="font-size: 18px; color: #6576ff; font-weight: 600; margin: 0;">Reset Password</h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;padding: 0 30px 20px">
                                                <p style="margin-bottom: 10px;">Hi,</p>
                                                <p style="margin-bottom: 25px;">Click On The link below to reset tour password.</p>
                                                <a class="reset-password-button" href=' . "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.db.php?code=$code" . '>Reset Password</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;padding: 20px 30px 40px">
                                                <p>If you did not make this request, please contact us or ignore this message.</p>
                                                <p style="margin: 0; font-size: 13px; line-height: 22px; color:#9ea8bb;">This is an automatically generated email please do not reply to this email. If you face any issues, please contact us at <a href="mailto:zachariasthanoss@gmail.com">zachariasthanoss@gmail.com</a> </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="width:100%;max-width:620px;margin:0 auto;">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center; padding:25px 20px 0;">
                                                <p style="font-size: 13px;">Copyright © 2021 MyPelatologio. All rights reserved.</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </center>
            </body>
            </html>
        ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '
            <!DOCTYPE html>
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="x-apple-disable-message-reformatting">
                
                <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
                <!--[if mso]>
                    <style>
                        * {
                            font-family: "Roboto", sans-serif !important;
                        }
                    </style>
                <![endif]-->
            
                <!--[if !mso]>
                    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
                <![endif]-->
                
                <style>
                    html,
                    body {
                        margin: 0 auto !important;
                        padding: 0 !important;
                        height: 100% !important;
                        width: 100% !important;
                        font-family: "Roboto", sans-serif !important;
                        font-size: 14px;
                        margin-bottom: 10px;
                        line-height: 24px;
                        color:#8094ae;
                        font-weight: 400;
                    }
                    * {
                        -ms-text-size-adjust: 100%;
                        -webkit-text-size-adjust: 100%;
                        margin: 0;
                        padding: 0;
                    }
                    table,
                    td {
                        mso-table-lspace: 0pt !important;
                        mso-table-rspace: 0pt !important;
                    }
                    table {
                        border-spacing: 0 !important;
                        border-collapse: collapse !important;
                        table-layout: fixed !important;
                        margin: 0 auto !important;
                    }
                    table table table {
                        table-layout: auto;
                    }
                    a {
                        text-decoration: none;
                    }
                    img {
                        -ms-interpolation-mode:bicubic;
                    }
                </style>
            
            </head>
            
            <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
                <center style="width: 100%; background-color: #f5f6fa;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
                        <tr>
                            <td style="padding: 40px 0;">
                                <table style="width:100%;max-width:620px;margin:0 auto;">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center; padding-bottom:25px">
                                                <p style="font-size: 18px; color: #6576ff; padding-top: 12px;">MyPelatologio</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                                    <tbody>
                                        <tr>
                                            <td style="text-align:center;padding: 30px 30px 15px 30px;">
                                                <h2 style="font-size: 18px; color: #FFBF00; font-weight: 600; margin: 0;">Reset Password Link.</h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;padding: 0 30px 20px">
                                                <p style="margin-bottom: 10px;">Hi,</p>
                                                <p>Reset Password link has been sent to your email..</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;padding: 0 30px 40px">
                                                <p style="margin: 0; font-size: 13px; line-height: 22px; color:#9ea8bb;">This is an automatically generated email please do not reply to this email. If you face any issues, please contact us at  <a href="mailto:zachariasthanoss@gmail.com">zachariasthanoss@gmail.com</a></p>
                                                <br>
                                                <p style="margin: 0; font-size: 13px; line-height: 22px; color:#9ea8bb;"> You can close this window now!</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="width:100%;max-width:620px;margin:0 auto;">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center; padding:25px 20px 0;">
                                                <p style="font-size: 13px;">Copyright © 2021 MyPelatologio. All rights reserved.</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </center>
            </body>
            </html>
        ';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>