<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">

    <title>BR Cast Vote</title>
</head>
<body>
    <nav>
        <div class="navbar">
            <ul>
                <li>
                    <a href="landing.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item" style="color:white;">Home</span>
                    </a>
                </li>
                <li>
                    <a href="profileuser_final.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item" style="color:white;">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item" style="color:white;">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

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

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $r_n = $_SESSION['roll_num'];
    $batc = $_SESSION['batchu'];

    $qsql = "SELECT * FROM candidate_database WHERE category = 'BR Category' AND batch = '$batc'";
    $result = mysqli_query($conn, $qsql);

    if ($result) {
        $aname = array();
        $manifesto = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($aname, $row['name']);
            array_push($manifesto, $row['manifesto']);
        }
    }
    ?>

    <section>
        
        <h1 style="padding-left: 20%;padding-bottom: 2%;font-size: 50px;color:#1e4f81;font-family: 'Nunito Sans', sans-serif;">BR Elections</h1>
        <form class="choice" method="post" action="">
            <h2 style="padding-left:20%;padding-bottom: 0%;font-size: 30px;color:#1e4f81;font-family: 'Nunito Sans', sans-serif;">BR Category</h2><br>
            <ul style="padding-left:20%;">
                <?php
                
                for ($i = 0; $i < count($aname); $i++) {
                    ?>
                    <li>
                        <cb>
                            <input type="radio" name="BR_Candidate" value="<?php echo $aname[$i] ?>" style="transform:scale(1.9);">
                            <c style="font-size:30px;padding-right: 303px;"><?php echo $aname[$i] ?></c>
                        </cb>

                        <button>
                            <a href="#" target="_thapa" style="color:white; font-size: 20px;">Manifesto</a>
                        </button><br>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <button class="sub_but" type="submit" name="save_opt" style="border-radius: 10px; border-left: 50px;padding-right: 100px; padding-left: 100px; margin-left:400px;"><b>Submit</b></button>
        </form>
    </section>

    <?php
    if (isset($_POST['save_opt'])) {
        $BR_can = htmlspecialchars($_POST['BR_Candidate']);
        $r_n = $_SESSION['roll_num'];
        $sql = "SELECT * FROM voting_response WHERE roll_number = '$r_n' AND elections = 'BR Elections'";
        $bquery_run = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($bquery_run);
        if ($rowCount <= 0) {
            $query = "INSERT INTO voting_response(roll_number, category, elections, candidate) VALUES ('$r_n', 'BR Category', 'BR Elections', '$BR_can') ";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                $_SESSION['status'] = "Voting completed";
                header("Location: success1.php");
                echo $_SESSION['status'];
            } else {
                $_SESSION['status'] = "Submit again";
                header("Location: cast_voteBR_final.php");
                echo $_SESSION['status'];
            }
        } else {
            header("Location: success_caste.php");
        }
    }
    ?>
</body>
</html>
