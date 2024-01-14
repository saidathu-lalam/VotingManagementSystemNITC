<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
        $servername = "localhost";
        $username = "u927048695_vms";
        $password = "Mvsp3499@";
        $dbname = "u927048695_vms";
            
            // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$r_n = $_SESSION['roll_num'];
$sql = "SELECT * FROM voting_response WHERE roll_number = '$r_n' and  elections = 'CR Elections' ";
$query_run = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($query_run);

if ($rowCount <= 0) {
    header("Location: cast_voteCR_final.php");
} else {
    header("Location: success_caste.php");
}


?>