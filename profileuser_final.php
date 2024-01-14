<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="navstyles.css">
  <title>User Profile</title>
  <style>
    @media (max-width:500px) {
      .row {
        display: flex;
        flex-direction: column;
        font-size: 70%;
      }

      .profile {
        font-size: 80%;
      }

      .sidehead {
        font-size: 75%;
      }
    }
  </style>
</head>

<body>
  <?php
  include('$include.lib');
  include('dbconfig.php');
  include('verifyuser.php');
  $sql = "SELECT * FROM vms_student_information_2 WHERE vms_student_information_2.roll_number='$r_n'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  ?>
  <nav>
    <div class="navbar" id="mySidebar1">
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
  <nav>
    <div id="mySidebar" class="navbar">
      <ul>
        <li>
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
            <span>×</span>
        </li>
        <li>
          <a href="landing.php">
            <i class="fas fa-home"></i> <span class="nav-item">Home</span>
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
    <div id="main1">
      <button class="openbtn" onclick="openNav()">☰</button>
    </div>
  </nav>
  <div class="container">

    <div style="padding-left:50px;">
      <ul>
        <h1 class="profile">
          Profile</h1>
        <div style="margin-bottom:15px;">
          <p class="row"> <span class="sidehead">NAME:</span>
            <?php echo $row['name']; ?>
          </p>
        </div>
        <div style="margin-bottom:15px;">
          <p class="row"> <span class="sidehead">Roll
              No:</span>
            <?php echo $row['roll_number']; ?>
          </p>
        </div>
        <div style="margin-bottom:15px;">
          <p class="row"> <span class="sidehead">Email
              id:</span>
            <?php echo $row['email']; ?>
          </p>
        </div>
        <div style="margin-bottom:15px;">
          <p class="row"> <span class="sidehead">Batch:</span></span>
            <?php echo $row['batch']; ?>
          </p>
        </div>
        <div style="margin-bottom:15px;">
          <p class="row"> <span class="sidehead">Department:</span>
            <?php echo $row['department']; ?>
          </p>
        </div>
      </ul>
    </div>
  </div>
  <script src="navbar.js"></script>
  <script>
    function showDivisionBasedOnResolution() {
      const navbar1 = document.getElementById("mySidebar1");
      const navbar2 = document.getElementById("mySidebar");
      const mainButton = document.getElementById("main");

      const screenWidth = window.innerWidth;

      if (screenWidth <= 768) {
        // Adjust the resolution breakpoint as needed
        navbar1.style.display = "none";
        navbar2.style.display = "block";
        mainButton.style.display = "block"; // Show the button when navbar2 is visible
      } else {
        navbar1.style.display = "block";
        navbar2.style.display = "none";
        mainButton.style.display = "none"; // Hide the button when navbar1 is visible
      }
    }

    // Call the function initially to set the initial visibility based on screen resolution
    showDivisionBasedOnResolution();

    // Add an event listener to recheck and update the visibility when the window is resized
    window.addEventListener("resize", showDivisionBasedOnResolution);

  </script>
</body>

</html>