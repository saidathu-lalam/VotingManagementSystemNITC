<?php
    if (isset($_POST["submit"])) {
           $fullName = $_POST["roll_no"];
           $passkey=$_POST["passkey"];
           


           $errors = array();
           
           if ( empty($fullName)  OR empty($passkey)) {
            array_push($errors,"All fields are required");
           }

           if (!preg_match('/^[A-Z]+$/', $fullName)) {
               $error = "Please enter only capital letters (excluding numbers).";
           }
           
            
            $servername = "localhost";
            $username = "u927048695_vms";
            $password = "Mvsp3499@";
            $dbname = "u927048695_vms";
            
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
                        

            if (!$conn) {
                die("Something went wrong;");
            }

            $fullName = $_POST["roll_no"];
            $passkey = $_POST["passkey"];

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
                        session_start();
                        $_SESSION["user"] = "yes";
                        $_SESSION['roll_num'] = $fullName;
                        $r_n = $_SESSION['roll_num'];


                        $sql = "SELECT * FROM vms_student_information_2 WHERE vms_student_information_2.roll_number='$r_n'";
                        $result = mysqli_query($conn, $sql);

                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['batchu'] = $row['batch'];
                       
                        if ($fullName === "ADMIN123") {
                            header("Location: admin_landing.php");
                        } else {
                            header("Location: landing.php");
                        }
                        die();
                    } else {
                        echo "Invalid data. Please try again.";
                    }
                }

                mysqli_stmt_close($stmt);
            }

            mysqli_close($conn);

       

    }
        ?>