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
        <form class="choice" method="post" action="act_res.php">
    <label for="category" style="font-size: 25px; padding-left: 320px;">Name of Category:</label>
    <select name="category" id="category" style="border:1px solid black;border-radius:10px;">
        <option value="Null">None</option>
        <option value="Boy Category">Boy Category</option>
        <option value="Girl Category">Girl Category</option>
        <option value="BR Category">BR Category</option>
    </select><br>
    <label for="batch" id="batchLabel" style="font-size: 25px; padding-left: 320px;">Batch:</label>
    <select name="Batch" id="Batch" style="border:1px solid black;border-radius:10px;margin-left:160px;padding-right:50px;">
        <option value="Null">None</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
    </select><br><br>
    <button class="sub_but" type="submit" name="update" style="background-color: #1e4f81; color: white; margin-left:20%; border-radius: 10px; border-left: 50px;"><b style="font-size:20px; padding-right:50px; padding-left:50px;">Submit</b></button>
</form>

<script>
    var categorySelect = document.getElementById('category');
    var batchLabel = document.getElementById('batchLabel');
    var batchSelect = document.getElementById('Batch');

    categorySelect.addEventListener('change', function() {
        if (categorySelect.value === 'BR Category') {
            batchLabel.style.display = 'none';
            batchSelect.style.display = 'none';
            batchSelect.value = 'Null';
        } else {
            batchLabel.style.display = 'inline-block';
            batchSelect.style.display = 'inline-block';
        }
    });
</script>

    </header>
</body>
</html>
