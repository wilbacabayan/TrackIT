<!DOCTYPE html>
<html lang="en">
    <?php include('connect.php')?>
    <head>
    <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Attendance Dashboard</title>
        <link rel="stylesheet" href="Loginstyle1.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="box form-box">
                <header>Login</header>
                <form action="" method="post">
                    
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <div class="field input">
                        <input type="submit" name="submit" value="Login" required><a href="Dashboard.html"></a>
                    </div>
                    <div class="links">
                        Don't have account? <a href="registerlogin.php">Sign Up Now</a>
                    </div>
                </form>
            </div>
        </div>

        <?php
            session_start();
         
            require_once 'connect.php';

            if(ISSET($_POST['submit'])){
                if($_POST['email'] != "" && $_POST['password'] != ""){
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $sql = "SELECT * FROM `user_records` WHERE `email`=? AND `_password`=? ";
                    $query = $conn->prepare($sql);
                    $query->execute(array($email,$password));
                    $row = $query->rowCount();
                    $fetch = $query->fetch();
                    if($row > 0) {
                        $_SESSION['email'] = $fetch['email'];
                        header("location: dashboard.html");
                    } else{
                        echo "
                        <script>alert('Invalid username or password')</script>
                        <script>window.location = 'Login.php'</script>
                        ";
                    }
                }else{
                    echo "
                        <script>alert('Please complete the required field!')</script>
                        //<script>window.location = 'Login.php'</script>";
                }
            }
        ?>
    </body>
</html>