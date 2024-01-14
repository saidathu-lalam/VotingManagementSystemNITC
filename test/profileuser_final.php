
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
  <title>User Profile</title>
  <style>
    .container{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: stretch;
    padding: 23px 10px;
    border: 1px solid #6a36d23e;
    border-left: 7px solid #6476C3;
    border-radius: 20px;
    background-color: white;
    width: 60%;
    margin-left:20%;
    
    }
  </style>

</head>
<body>
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
if (!$conn) {
  die("Something went wrong;");
}

$r_n = $_SESSION['roll_num'];


$sql = "SELECT * FROM vms_student_information_2 WHERE vms_student_information_2.roll_number='$r_n'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


  


?>
  <nav>
        <div class="navbar">
          <ul>
            <li><a href="landing.php">
              <i class="fas fa-home"></i>
              <span class="nav-item" style="color:white;">Home</span>
            </a></li>
            <li><a href="profileuser_final.php">
              <i class="fas fa-user"></i>
              <span class="nav-item" style="color:white;">Profile</span>
            </a></li>
            
    
            <li><a href="logout.php" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item" style="color:white;">Log out</span>
            </a></li>
          </ul>
        </div>
        
    </nav>
  <div class="container">
    
    <div style="padding-left:50px;">
    <ul>
    <h1 style="padding-left: 20%;padding-bottom: 2%;font-size: 50px;color:#1e4f81;font-family: 'Nunito Sans', sans-serif;">Profile</h1>      
    <li>
        <h4 style="font-size: 30px; padding-right: 510px;">Name:</h4>
        <p style="font-size=10px; padding-left:230px"><?php echo $row['name'];?></p>
    </li>
    <li>
        <h4 style="font-size: 30px; padding-right: 510px;">Roll no:</h4>
        <c style="font-size=10px; padding-left:230px"><?php echo $row['roll_number'];?></c>
    </li>
    <li>
        <h4 style="font-size: 30px; padding-right: 510px;">Email id:</h4>
        <c style="font-size=10px; padding-left:230px"><?php echo $row['email'];?></c>
    </li>
    <li>
        <h4 style="font-size: 30px; padding-right: 510px;">Batch:</h4>
        <c style="font-size=10px; padding-left:230px"><?php echo $row['batch'];?></c>
    </li>
    <li>
        <h4 style="font-size: 30px; padding-right: 510px;">Department:</h4>
        <c style="font-size=10px; padding-left:230px"><?php echo $row['department'];?></c></li>
    </ul>
    </div>
    
    
           
    
  </div>
</body>
</html>
