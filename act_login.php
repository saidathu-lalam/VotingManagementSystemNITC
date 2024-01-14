<?php
include('$include.lib');
include('dbconfig.php');

//$html='Msg';
if (isset($_POST["send"])) {
    $email = $_POST["email"];
    
    $errors = array();
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
       }
    if(!isValidOrganizationalEmail($email)){
        array_push($errors,"Enter Institute Mail id!");
    }
    if (count($errors)>0 && $email != "prasad910070@gmail.com") {
        foreach ($errors as  $error) {
            session_start();
                $_SESSION['error_message'] = $error;
                header("Location: dsp_register.php");
                exit; 
        }
       }
                

$sql = "SELECT * FROM vms_student_information_2 WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($result); // Removed COUNT function



if ($rowcount > 0) {
    
    include('smtp/PHPMailerAutoload.php'); 
            $randomPassword = generateRandomPassword();
            smtp_mailer($email,'subject',$html);
            $to = $email ;
            $subject = "please confirm your email ";
            $msg = '<html>
    <body>
        <p>Dear User,</p>
        <p>This is a mail from VMS NITC.The login credentials for your username.</p><br>
        
        <p>Username: ' . $email . '.</p><br>
        <p>Temporary Password: ' . $randomPassword . '.</p><br>
        
        <p>Kindly note that this temporary password is valid for your initial login only. For enhanced security measures, we will send a new password to your registered email address for subsequent logins.</p><br>
        
        <p>Should you encounter any difficulties or have any questions regarding accessing your account, please do not hesitate to reach out to us at svms1416@gmail.com. Our dedicated support team will be more than happy to assist you promptly.</p><br>
        
        <p>We are committed to delivering a seamless online experience, and we look forward to serving you.</p><br>
        
        <p>Best regards,</p><br>
        
        <p>VMS SUPPORT<br>campaigners.in</p><br>
    </body>
    </html>';


           
            $headers = "From: ".$email;

            smtp_mailer($to,$subject, $msg);
            
            $ksql = "UPDATE vms_student_information_2 SET passkey = '$randomPassword' WHERE email = '$email'";
                $result = $conn->query($ksql);
                header("Location: index.php");
            
        
} else {
    session_start();
                $_SESSION['error_message'] = "please provide correct email";
                header("Location: dsp_register.php");
                exit;
                
            }
        
            
        }      

       
        
        ?>