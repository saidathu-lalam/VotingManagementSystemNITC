<!DOCTYPE html>
<html>
     <?php
    error_reporting(E_ALL);
ini_set('display_errors', 1);
    
    
    ?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login page</title>

</head>

<body>
    <?php
    error_reporting(E_ALL);
ini_set('display_errors', 1);
    include('$include.lib');
    include('dbconfig.php');
    
    ?>
    <header>
        <img src="nitc.png" class="nitc-logo">
        <h2 class="heading">Voting Management System</h2>
        <h3 class="title">Login to Cast your vote</h3>
    </header>

    <!-- container div -->
    <div class="container">

        <div class="form-section">
            <!-- login form -->
            <form method="post" action="act_pass.php">
                <div class="login-box">
                    <input type="text" name="roll_no" class="email ele" placeholder="Enter Roll no in Capitals">
                    <input type="password" id="password" name="passkey" class="password ele" placeholder="password">
                    <div>
                        <p>
                            <input type="checkbox" id="togglePassword">
                            Show Password
                        </p>
                        <script>
                            document.getElementById("togglePassword").addEventListener("change", function () {
                          var passwordInput = document.getElementById("password");
                          if (passwordInput.type === "password") {
                            passwordInput.type = "text";
                          } else {
                            passwordInput.type = "password";
                          }
                        });

                            
                        </script>
                    </div>
                    <a href="dsp_register.php">Forgot Password?</a>
                    <button class="clkbtn" type="submit" name="submit">Login</button>
                </div>
                <span class="reg">
                    <a href="dsp_register.php">Don't have account? Register.</a>
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
    <!--<script src="password_viewer.js"></script>-->
</body>

</html>