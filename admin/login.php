<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"; ?>
    <div class="continer">
        <div class="loginform">
            <h2>Admin-Login</h2>
            <form action="" method="post">
                <input type="text" class="input" name="username" id="username" placeholder="Username" required> <br>
                <input type="password" class="input" name="password" id="password" placeholder="Password" required> <br>
                <input type="submit" class="loginbtn" value="Login">
            </form>
        </div>
    </div>
</body>
</html>
<?php
require('../db/connect.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username']))
{
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
    $query = "SELECT * FROM `admin` WHERE username ='$username' and password='$password'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	$rows = mysqli_num_rows($result);
    if( $rows == 1 )
    {
        $_SESSION['id'] = $username;
        header("Location:home.php");
    }
    else{
		echo "<div class='form'>
		<h3>Username/password is incorrect.</h3>
		<br/>Click here to <a href='login.php'>Login</a></div>";
	}
  }
?>
