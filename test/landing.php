<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NITC-VMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="landing-style.css">
    
</head>
<body >
<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

?>
    <nav>
        <div class="navbar" id="mySidebar">
            <ul>
                <li>
                    <a href="landing.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="profileuser_final.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <header id="main">
        <h1>Student Landing Page</h1>
    </header>
    <div class="container">
        <div class="curr">
            <h3>Current Elections</h3>
            <a href="verifyCR.php"><button type="button">CR Elections</button></a>
            <a href="verifyBR.php"><button type="button">BR Elections</button></a>
            
        </div>
        <div class="past">
            <h3>Past Elections</h3>
           <a href="results_voter_final_form.php"><button type="button">Results</button></a>

        </div>
        
    </div>
</body>
</html>