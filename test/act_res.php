<?php
    $servername = "localhost";
    $username = "u927048695_vms";
    $password = "Mvsp3499@";
    $dbname = "u927048695_vms";
            
            // Create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);
                        

if (!$con) {
    die("Something went wrong;");
}
function image_con($efg){
    $servername = "localhost";
    $username = "u927048695_vms";
    $password = "Mvsp3499@";
    $dbname = "u927048695_vms";
            
            // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
                        

    if (!$conn) {
        die("Something went wrong;");
    }
    $query = "SELECT image FROM candidate_database WHERE name = '$efg'";
    $stmt = $conn->prepare($query);

    $stmt->execute();
    
    $stmt->bind_result($imageData);
    $stmt->fetch();

    $image = imagecreatefromstring($imageData);

    // Resize the image to 50x50 pixels
    $resizedImage = imagescale($image, 200, 105);

    // Start output buffering
    ob_start();

    // Output the resized image into the buffer
    imagejpeg($resizedImage);

    // Get the contents of the buffer and store it in a variable
    $imageData = ob_get_clean();

    // Destroy the images
    imagedestroy($image);
    imagedestroy($resizedImage);
    $stmt->close();
    $conn->close();
    return $imageData; 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $cat = $_POST['category'];
        $bat = $_POST['Batch'];

        if ($cat != 'BR Category'|| 'Null' && $bat != 'Null') {
            $sql = "SELECT * FROM candidate_database WHERE category = '$cat' AND batch = '$bat'";
            $result = mysqli_query($con, $sql);

            if ($result) {
                $name = array();
                $votes = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($name, $row['name']);
                    array_push($votes, $row['votes']);
                }

                $max_votes = max($votes);
                $max_votes_key = array_search($max_votes, $votes);
                $winner = $name[$max_votes_key];
                $imageData=image_con($winner);
                
                ?>
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Results</title>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
                    <link rel="stylesheet" href="main.css">
                </head>
                <body>
                    <nav>
                        <div class="navbar">
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
                    <header>
                        <h1>Election Statistics</h1>
                    </header>
                    <section class="container">
                        <h3>Election Results</h3>
                        <div class="card">
                            <div class="box">
                                <h5>
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($imageData); ?>" alt="Winner Image">
                                </h5>
                                <h3><?php echo "CR Elections" ?></h3>
                                <h3><?php echo isset($cat) ? $cat : ''; ?></h3>
                                <h3><?php echo isset($winner) ? $winner : ''; ?></h3>
                                <h3>Batch: <?php echo isset($bat) ? $bat : ''; ?></h3>
                                <h3>Total Votes: <?php echo isset($max_votes) ? $max_votes : ''; ?></h3>
                                <h3>Winner!</h3>
                            </div>
                        </div>
                    </section>
                </body>
                </html>
                <?php
            } else {
                echo "Error fetching data from the database.";
            }
        } elseif ($cat == 'BR Category' && $bat == 'Null') {
            $sql = "SELECT * FROM candidate_database WHERE category = '$cat'";
            $result = mysqli_query($con, $sql);
            

            if ($result) {
                $name = array();
                $votes = array();
                $batc =array();
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($name, $row['name']);
                    array_push($votes, $row['votes']);
                    array_push($batc,$row['batch']);
                }
                

                $max_votes = max($votes);
                $max_votes_key = array_search($max_votes, $votes);
                unset($votes[$max_votes_key]);
                $max2 = max($votes);
                $max2_key = array_search($max2, $votes);

                $winner = $name[$max_votes_key];
                $runner = $name[$max2_key];
                $bat1= $batc[$max_votes_key];
                $bat2= $batc[$max2_key];

            
                //2
                $imageData1=image_con($winner);
                $imageData2=image_con($runner);
                

                ?>
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Results</title>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
                    <link rel="stylesheet" href="main.css">
                </head>
                <body>
                    <nav>
                        <div class="navbar">
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
                    <header>
                        <h1>Election Statistics</h1>
                    </header>
                    <section class="container">
                        <h3>Election Results</h3>
                        <div class="card">
                            <div class="box">
                            <h5>
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($imageData1); ?>" alt="Winner Image">
                                </h5>
                                <h3><?php echo isset($cat) ? $cat : ''; ?></h3>
                                <h3><?php echo isset($winner) ? $winner : ''; ?></h3>
                                <h3>Batch: <?php echo isset($bat1) ? $bat1 : ''; ?></h3>
                                <h3>Total Votes: <?php echo isset($max_votes) ? $max_votes : ''; ?></h3>
                                <h3> Winner!</h3>
                            </div>
                            <div class="box">
                            <h5>
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($imageData2); ?>" alt="Winner Image">
                                </h5>
                                <h3><?php echo "BR Elections" ?></h3>
                                <h3><?php echo isset($cat) ? $cat : ''; ?></h3>
                                <h3><?php echo isset($runner) ? $runner : ''; ?></h3>
                                <h3>Batch: <?php echo isset($bat2) ? $bat2 : ''; ?></h3>
                                <h3>Total Votes: <?php echo isset($max2) ? $max2 : ''; ?></h3>
                                <h3> Runner Up !</h3>
                            </div>
                        </div>
                    </section>
                </body>
                </html>
                <?php
            } else {
                echo "Error fetching data from the database.";
            }

        } else {
            echo "Please select a valid category and batch.";
        }
    } else {
        echo "Invalid form data.";
    }
} else {
    echo "Form not submitted.";

}
?>
