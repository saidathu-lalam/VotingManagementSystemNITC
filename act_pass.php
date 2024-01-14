<?php
           
        include('dbconfig.php');          
        if (isset($_POST["submit"])) {
            $fullName = $_POST["roll_no"];
            $passkey=$_POST["passkey"];
            $errors = array();
            
            if ( empty($fullName)  OR empty($passkey)) {
             array_push($errors,"*All fields are required");
            }
             if (!preg_match('/^[A-Z0-9]+$/',$fullName)) {
   $errors[] = "Please enter Roll no only capital letters (excluding numbers).";
}
            if (count($errors)>0) {
                foreach ($errors as  $error) {
                    session_start();
                        $_SESSION['error_message'] = $error;
                        header("Location: index.php");
                        exit; 
             }
            }
            else{
            $sql = "SELECT * FROM vms_student_information_2 WHERE roll_number = ?";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $fullName);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $rowCount = mysqli_num_rows($result);

                if ($rowCount > 0) {
                    $row = mysqli_fetch_assoc($result);

                    if ($row["passkey"] === $passkey) {
                        
                       
                        if ($fullName == "ADMIN123" ||$fullName == "admin123") {
                            session_start();
                        $_SESSION["admin"] = "yes";
                        $_SESSION['roll_num'] = $fullName;
                        $r_n = $_SESSION['roll_num'];
                        
                        $vsql="INSERT into login_details(roll_no,status) values('$r_n','Login Successfull');";
                        $res=mysqli_query($conn,$vsql);

                        $sql = "SELECT * FROM vms_student_information_2 WHERE vms_student_information_2.roll_number='$r_n'";
                        $result = mysqli_query($conn, $sql);
                        

                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['batchu'] = $row['batch'];

                            header("Location: admin_landing.php");
                        } else {
                            session_start();
                        $_SESSION["user"] = "yes";
                        $_SESSION['roll_num'] = $fullName;
                        $r_n = $_SESSION['roll_num'];

                        $vsql="INSERT into login_details(roll_no,status) values('$r_n','Login Successfull');";
                        $res=mysqli_query($conn,$vsql);
                        $sql = "SELECT * FROM vms_student_information_2 WHERE vms_student_information_2.roll_number='$r_n'";
                        $result = mysqli_query($conn, $sql);

                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['batchu'] = $row['batch'];
                            header("Location: landing.php");
                        }
                        die();
                    } else {
                        session_start();
                        $_SESSION['error_message'] = "Invalid Credentials. Please try again.";
                        header("Location: index.php");
                        exit;
                        
                    }
                }else{
                    session_start();
                        $_SESSION['error_message'] = "Invalid Credentials. Please try again.";
                        header("Location: index.php");
                        exit;
                    
                }

                mysqli_stmt_close($stmt);
            }else{
                session_start();
                    $_SESSION['error_message'] = "Invalid Credentials. Please try again.";
                    header("Location: index.php");
                    exit;
                
            }
        }
            mysqli_close($conn);

           }else{
            session_start();
                        $_SESSION['error_message'] = "options not submitted";
                        header("Location: index.php");
                        exit;
           }

               
        ?>