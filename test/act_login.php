<?php
function generateRandomPassword($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}
function isValidOrganizationalEmail($email) {
    // Split the email address into username and domain parts
    list($username, $domain) = explode('@', $email);

    // Check if the domain matches the organizational domain
    $organizationalDomain = 'nitc.ac.in'; 
    return $domain === $organizationalDomain;
}
    
    include('smtp/PHPMailerAutoload.php');
    $html='Msg';
    
    function smtp_mailer($to,$subject, $msg){
    	$mail = new PHPMailer(); 
    	//$mail->SMTPDebug  = 3;
    	$mail->IsSMTP(); 
    	$mail->SMTPAuth = true; 
    	$mail->SMTPSecure = 'tls'; 
    	$mail->Host = "smtp.gmail.com";
    	$mail->Port = 587; 
    	$mail->IsHTML(true);
    	$mail->CharSet = 'UTF-8';
    	$mail->Username = "svms1416@gmail.com";
    	$mail->Password = "nvngjzblvtgnzjfe";
    	$mail->SetFrom("svms1416@gmail.com");
    	$mail->Subject = $subject;
    	$mail->Body =$msg;
    	$mail->AddAddress($to);
    	$mail->SMTPOptions=array('ssl'=>array(
    		'verify_peer'=>false,
    		'verify_peer_name'=>false,
    		'allow_self_signed'=>false
    	));
    	if(!$mail->Send()){
    		echo $mail->ErrorInfo;
    	}else{
    		return 'Sent';
    	}
    }
    
if (isset($_POST["send"])) {
            $email = $_POST["email"];
            $errors = array();
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
               }
            if(!isValidOrganizationalEmail($email)){
                array_push($errors,"Enter Institute Mail id!");
            }
            if (count($errors)>0) {
                foreach ($errors as  $error) {
                    echo "<div class='alert alert-danger' >$error</div>";
                }
               }else{
            
            $randomPassword = generateRandomPassword();
            smtp_mailer($email,'subject',$html);
            $to = $email ;
            $subject = "please confirm your email ";
            $msg = "Your random password: " . $randomPassword;;
            $headers = "From: ".$email;

            smtp_mailer($to,$subject, $msg);
            $servername = "localhost";
            $username = "u927048695_vms";
            $password = "Mvsp3499@";
            $dbname = "u927048695_vms";
            
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
                        

            
            if (!$conn) {
                die("Something went wrong;");
            }
            $ksql = "UPDATE vms_student_information_2 SET passkey = '$randomPassword' WHERE email = '$email'";
                $result = $conn->query($ksql);
                header("Location: dsp_validation.php");
            }
        }
        
        ?>