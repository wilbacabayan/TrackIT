<!DOCTYPE html>
<html lang="en">
<?php include('connect.php')?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Attendance Dashboard</title>
    <link rel="stylesheet" href="Loginregister.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Register</header>
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
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                </div>
                <div class="field input">
                    <input type="submit" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already have an account? <a href="Login.php">Login here</a>
                </div>
            </form>
        </div>
    </div>

    <?php 
            if(isset($_POST['submit'])){
                $email_check =$_POST['email'];
                $query = $conn->prepare( "SELECT `email` FROM `user_records` WHERE `email` = ?" );
                $query->bindValue( 1, $email_check);
                $query->execute();
            
                if( $query->rowCount() > 0 ) {
                    echo "<script>alert('Email already exists')</script>
                        <script>window.location = 'registerlogin.php'</script>";
                }elseif ($_POST['password'] != $_POST['confirm_password']){
                    echo "<script>alert('Password does not match')</script>
                        <script>window.location = 'registerlogin.php'</script>";
                }else {
           

                    $email =$_POST['email'];
                    $passWord =$_POST['password'];

                    $sql_insert = "INSERT INTO user_records (email,_password)
                                    VALUES (:email, :_password)";

                    $preparedInsert = $conn->prepare($sql_insert);
                    $preparedInsert->bindParam(':email', $email);
                    $preparedInsert->bindParam(':_password', $passWord);

                    $preparedInsert->execute();
                    $rows = $preparedInsert->rowCount();
                    
                    if($rows > 0){
                        header("Location: Login.php");
                        echo "<script>alert('Successfully saved')</script";
                        // exit();
                    }else{
                        echo "<script>alert('Error')</script";
                    }

                }
            }
 
        ?>
</body>
</html>
