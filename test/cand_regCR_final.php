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
    <title>Candidate Registration for CR</title>
</head>
<body>
    <nav>
        <div class="navbar">
          <ul>
            <li><a href="admin_landing.html">
              <i class="fas fa-home"></i>
              <span class="nav-item" style="color:white;">Home</span>
            </a></li>
            <li><a href="profile.php">
              <i class="fas fa-user"></i>
              <span class="nav-item" style="color:white;">Profile</span>
            </a></li>
            <li><a href="users.php" class="Users">
                <i class="fas fa-address-card"></i>
                <span class="nav-item" style="color:white;">Users</span>
            </a></li>
    
            <li><a href="logout.php" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item" style="color:white;">Log out</span>
            </a></li>
            
          </ul>
        </div>
        
    </nav>
    <div class="container" style="padding-left:20%;">
    <h1 style="padding-left: 20%;padding-bottom: 2%;font-size: 50px;color:#1e4f81;font-family: 'Nunito Sans', sans-serif;">CR Candidates Registration</h1> 
         
    <form class="choice" method="post" action="">
    <ul>
                <li>
                  <label for="Elections" class="inp1" >Name of Elections:</label>
                  <select name="Elections" id="E1" style="border:1px solid black;border-radius:10px;margin-left:40px;">
                      <option value="CR Elections">CR Elections</option>
                      
                  </select><br><br>
                </li>
                <li>
                  <label for="categories" class="inp1" >Name of Category:</label>
                  <select name="Catogory" id="E2" style="border:1px solid black;border-radius:10px;margin-left:40px;">
                      <option value="Boy Category">Boy Category</option>
                      <option value="Girl Category">Girl Category</option>
                      
                  </select><br><br>
                </li>
                <li>
                  <label for="C1" class="inp1" >Name Of the candidate:</label>
                  <input style="border:1px solid black;margin-left:10px;" type="text" id="C1" name="Name" value=""><br><br>
                </li>
                <li>
                  <label for="C1" class="inp1" >Roll Number:</label>
                  <input style="border:1px solid black;margin-left:85px;" type="text" id="C1" name="Roll_no" value=""><br><br>
                </li> 
                <li> 
                  <label for="C1" class="inp1" >Email id:</label>
                  <input style="border:1px solid black;margin-left:115px;" type="text" id="C1" name="Email_id" value=""><br><br>
                </li>
                <li> 
                  
                  <label for="Batch" class="inp1" >Batch:</label>
                  <select name="Batch" id="E2" style="border:1px solid black;border-radius:10px;margin-left:160px;">
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                  </select><br><br>
                </li>
                <li>
                  <label for="C1" class="inp1" >Department:</label>
                  <input style="border:1px solid black;margin-left:90px;" type="text" id="C1" name="Department" value=""><br><br>
                </li>
                <li>
                  <label for="C1" class="inp1" >Manifesto:</label>
                  <input type="file" name="upload" accept="application/pdf,application/vnd.ms-excel" style="border:1px solid black;border-radius:10px;margin-left:100px;" /><br><br>
                </li>
                <li>
                  <label for="C1" class="inp1" >Image:</label>
                  <input type="file" name="upload_img" style="border:1px solid black;border-radius:10px;margin-left:125px;"/><br><br>
                </li>
      
                  <!-- <button ><a href="#" style="color:white; font-size: 30px;">Boy Catogary</a></button><br>
                <button ><a href="#" style="color:white; font-size: 30px;">Girl Catogary</a></button><br> -->
                </ul>
                <button class="sub_but" type="submit" name="save_opt"  style=" border-radius: 10px; border-left: 50px; align: center; padding-left:50px;margin-left: 106px;"><b style="font-size:25px; padding-right:50px">Submit</b></button>
                

    </div>
    </section>
    <div style="padding-left:150px;color:red;">
    <?php
    
    
        $servername = "localhost";
        $username = "u927048695_vms";
        $password = "Mvsp3499@";
        $dbname = "u927048695_vms";
            
            // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
if(isset($_POST['save_opt'])){
    $Elections=$_POST['Elections'];
    $Catogory=$_POST['Catogory'];
    $Name=$_POST['Name'];
    $Roll_no=$_POST['Roll_no'];
    $Email_id=$_POST['Email_id'];
    $Batch=$_POST['Batch'];
    $dept=$_POST['Department'];
    $Manifesto=$_POST['upload'];
    $Image=$_POST['upload_img'];
   
    $errors = array();
           
           if (empty($Elections) OR empty($Catogory) OR empty($Name) OR empty( $Roll_no)OR empty( $Email_id)OR empty($Batch)OR empty( $dept)OR empty( $Manifesto)OR empty( $Image)) {
            array_push($errors,"*All fields are required");
           }
           if (!filter_var($Email_id, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "*Email is not valid");
           }
          
           if (!preg_match('/^[A-Z]+$/',$Roll_no)) {
            $error = "Please enter only capital letters (excluding numbers).";
        }
        $sql = "SELECT * FROM candidate_database WHERE email = ' $Email_id' OR roll_number ='$Roll_no'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount>0) {
         array_push($errors,"*Email or Roll no already exists!");
        }
        if (count($errors)>0) {
         foreach ($errors as  $error) {
             echo "<div class='alert alert-danger'>$error</div><br>";
         }

        }else{
         
            $query = " INSERT INTO candidate_database(roll_number,name,email,batch,department,elections,category,manifesto,image) VALUES ('$Roll_no','$Name','$Email_id','$Batch','$dept','$Elections','$Catogory','$Manifesto','$Image'); " ;
            $query_run= mysqli_query($conn,$query);
               
         echo "<div class='alert alert-success'>You are registered successfully.</div>";
        }
       



    
}
elseif(isset($_POST['update'])){
    $Elections=$_POST['Elections'];
    $Catogory=$_POST['Catogory'];
    $Name=$_POST['Name'];
    $Roll_no=$_POST['Roll_no'];
    $Email_id=$_POST['Email_id'];
    $Batch=$_POST['Batch'];
    $dept=$_POST['Department'];
    $Manifesto=$_POST['upload'];
    $errors = array();
           
    if (empty($Elections) OR empty($Catogory) OR empty($Name) OR empty( $Roll_no)OR empty( $Email_id)OR empty($Batch)OR empty( $dept)OR empty( $Manifesto)OR empty( $Image)) {
     array_push($errors,"*All fields are required");
    }
    if (!preg_match('/^[A-Z]+$/', $dept)) {
      $error = "Please enter only capital letters (excluding numbers).";
     }
    
    if (!preg_match('/^[A-Z]+$/', $Roll_no)) {
     $error = "Please enter only capital letters (excluding numbers).";
    }

    $query = "SELECT * FROM Candidate_database WHERE email = '$Email_id' OR roll_number = '$Roll_no'" ;
      $query_run= mysqli_query($conn,$query);
      $rowCount = mysqli_num_rows($query_run);
        if ($rowCount<=0) {
         array_push($errors,"*Email or Roll no not registered!");
        }
        if (count($errors)>0) {
         foreach ($errors as  $error) {
             echo "<div class='alert alert-danger'>$error</div><br>";
         }

        }else{
         
            $dquery = " DELETE * FROM candidate_database WHERE roll_number=$Roll_no;" ;
            $dquery_run= mysqli_query($conn,$dquery);
            $uquery = " UPDATE candidate_database (roll_number,name,email,batch,department,elections ,category,manifesto,image) VALUES ('$Roll_no','$Name','$Email_id','$Batch','$dept','$Elections','$Catogory','$Manifesto','$Image'); " ;
            $uquery_run= mysqli_query($conn,$uquery);
            if($dquery_run&&$uquery_run){
              $_SESSION['status'] ="Deleted and Updated Succesfully";
              echo $_SESSION['status'];
              
          }
            else{
              $_SESSION['status'] =" Not Updated Succesfully";
              echo $_SESSION['status'];
    
          }
        }
       


      
}




?> 
</div>
</body>
</html>