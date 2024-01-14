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

  <title>CR Cast Vote</title>
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

  ?>
  <div class="cont">
    <h1 class="crele">CR Elections</h1>
    <form class="choice" method="post" action="act_cast_voteCR.php">
      <div class="curr">
        <h2 class="cat">Boy Category</h2>
        <ul>
          <?php
          $qsql = "SELECT * from candidate_database where candidate_database.category='Boy Category' and candidate_database.batch='$batc'"; //Here we need to udate email with variable
          $result = mysqli_query($conn, $qsql);
          if ($result) {
            $aname = array();
            $manifesto = array();
            while ($row = mysqli_fetch_assoc($result)) {
              array_push($aname, $row['name']);
              array_push($manifesto, $row['pdf']);
            }
          }
          for ($i = 0; $i < count($aname); $i++) {
            ?>
            <li>
              <cb><input type="radio" name="Boy_Candidate" value="<?php echo $aname[$i] ?>"
                  style="transform:scale(1.5);margin-right:10px;" required="required" />
                <c style="font-size:30px;padding-right: 400px;">
                  <?php echo $aname[$i] ?>
                </c>
              </cb>
              <button class="button"
                style="border-radius: 10px; border-left: 50px;padding-right: 50px; padding-left: 50px; margin-left:500px;">
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
      </div>
      <div class="curr">
        <h2 class="cat">Girl Category</h2>
        <ul>
          <?php
          $qsql = "SELECT * from candidate_database where candidate_database.category='Girl Category' and candidate_database.batch='$batc'"; //Here we need to udate email with variable
          $result = mysqli_query($conn, $qsql);
          if ($result) {
            $aname = array();
            $manifesto = array();
            while ($row = mysqli_fetch_assoc($result)) {
              array_push($aname, $row['name']);
              array_push($manifesto, $row['pdf']);
            }
          }
          for ($i = 0; $i < count($aname); $i++) {
            ?>
            <li>
              <cb><input type="radio" name="girl_Candidate" value="<?php echo $aname[$i] ?>"
                  style="transform:scale(1.5);margin-right:10px;" required="required" />
                <c style="font-size:30px;padding-right: 400px;">
                  <?php echo $aname[$i] ?>
                </c>
              </cb>
              <button class="button"
                style="border-radius: 10px; border-left: 50px;padding-right: 50px; padding-left: 50px; margin-left:500px;">
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
      </div>

      <div class="but">
        <button class="button" type="submit" name="save_opt" style=" "><b>submit</b></button>
      </div>
    </form>
  </div>


</body>
<script src="navbar.js"></script>

</html>