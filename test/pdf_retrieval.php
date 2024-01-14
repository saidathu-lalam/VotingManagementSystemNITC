<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user"])) {
    header("Location: dsp_loginpage.php");
    exit();
}

$batc = $_SESSION['batchu'];

if (isset($_GET['pdf'])) {
    $pdfIndex = $_GET['pdf'];

    $hostName = "localhost";
            $dbUser = "u927048695_vms";
            $dbPassword = "Mvsp3499@";
            $dbName = "u927048695_vms";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT manifesto FROM candidate_database WHERE category = 'BR Category' AND batch = ?"; // Replace with your table name and column names
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $batc); // Replace $batc with the actual batch value
    $stmt->execute();
    $stmt->bind_result($manifesto);
    $stmt->fetch();

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="manifesto.pdf"');
    echo $manifesto;

    $stmt->close();
    mysqli_close($conn);
} else {
    echo "PDF not found.";
}
?>
