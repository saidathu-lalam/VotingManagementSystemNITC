<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login page</title>
</head>

<body>
    <header>
        <img src="nitc.png" class="nitc-logo">
        <h2 class="heading">Voting Management System</h2>
        <h3 class="title">Login to Cast your vote</h3>
    </header>
    <div class="container">
        <div class="form-section">
            <form method="POST" action="act_login.php">
                <div class="signup-box">
                    <input type="email" name="email" class="email ele" placeholder="youremail@nitc.ac.in">
                    <button class="clkbtn" name="send">Get Password</button>
                </div>
                <span class="reg">
                    <a href="index.php">Click here for login</a>
                </span>
                <div class="foot"> For any queries contact:<br>
                    <a href="mailto:svms1416@gmail.com">svms1416@gmail.com</a>
                </div>
                <?php
                session_start();
                if (isset($_SESSION['error_message'])) {
                    // Wrap the error message in a span with a CSS class for styling
                    echo '<span style="color: red;">' . $_SESSION['error_message'] . '</span>';
                    unset($_SESSION['error_message']); // Clear the message so it won't be displayed again on refresh
                }
                ?>
            </form>
        </div>
    </div>
    </div>
</body>

</html>