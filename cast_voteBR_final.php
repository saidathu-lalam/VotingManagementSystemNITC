<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="navstyles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">

  <title>BR Cast Vote</title>
  <style>
    .cont {
      padding-left: 280px;
    }
  </style>
</head>

<body>

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

  <?php
  include('$include.lib');
  include('dbconfig.php');
  include('verifyuser.php');

  $qsql = "SELECT * FROM candidate_database WHERE category = 'BR Category'";
  $result = mysqli_query($conn, $qsql);

  if ($result) {
    $aname = array();
    $manifesto = array();
    while ($row = mysqli_fetch_assoc($result)) {
      array_push($aname, $row['name']);
      array_push($manifesto, $row['pdf']);
    }
  }
  ?>

  <div class="cont">
    <h1 class="crele">BR Elections</h1><br>
    <form class="choice" method="post" action="act_cast_voteBR.php">
      <div class="curr">
        <ul>
          <?php

          for ($i = 0; $i < count($aname); $i++) {
            ?>
            <li>
              <cb>
                <input type="radio" name="BR_Candidate" value="<?php echo $aname[$i] ?>"
                  style="transform:scale(1.5);margin-right:5px;" required="required" />
                <c style="font-size:30px;">
                  <?php echo $aname[$i] ?>
                </c><br>
              </cb>
              <button class="button">
                <?php
                $sql = "SELECT pdf from candidate_database where name = '$aname[$i]' ";
                $query = mysqli_query($conn, $sql);
                $info = mysqli_fetch_array($query)
                  ?>
                <a href="pdf/<?php echo $info['pdf']; ?>" style="color:white; font-size: 20px;">Manifesto</a>
              </button><br>
            </li>
            <?php
          }
          ?>
        </ul>
      </div>
      <div class="but">
        <button class="button" type="submit" name="save_opt" style=" "><b>submit</b></button>
      </div>
    </form>
  </div>


</body>
<script src="navbar.js"></script>

</html>