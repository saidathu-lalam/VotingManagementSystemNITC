
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login page</title>
    
</head>
<body onload="disableNavigation()">


<div class="container"><h1 >Welcome to vms</h1>
    <form method="POST" action="act_pass.php" >
        <input type="text" id="roll" name="roll_no" required placeholder="Enter your Roll no in capitals" class="inp"><br>
        <input type="password" id="passkey" name="passkey" required placeholder="Enter password sent to your mail" class="inp"><br>
        
        <button type="submit" name="submit" class="sub-btn">Login</button>
    </form>
    </div>
    </body>
</html>