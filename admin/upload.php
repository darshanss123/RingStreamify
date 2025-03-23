<?php
    session_start();
    include '../db/connect.php';
    if(!$_SESSION['id'])
    {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Upload Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
</head>
<body>
 <?php include "navbar.php"; ?>
    <div class="continer">
        <h2>RingTone Details</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <label for="title">Title :</label>
            <input type="text" class="input" name="title" id="title" placeholder="Ringtone Title"> <br>
            <label for="icon" >Icon :</label>
            <input type="file" class="input" name="icon" id="icon" accept="image/png, image/gif, image/jpeg" > <br>
            <label for="song" >Song :</label>
            <input type="file" class="input" name="song" id="song" accept="audio/*" > <br>
            <input type="submit" class="uploadbtn" name="Upload" value="Upload">
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['Upload']))
{
    echo "somedthing wrong";
    $title=$_POST["title"];
    $icon=$_FILES["icon"]["name"];
    $song=$_FILES["song"]["name"];
    $icon_target="../icons/".basename($icon);
    $song_target="../songs/".basename($song);
	if(move_uploaded_file($_FILES["icon"]["tmp_name"], $icon_target))
	{
        move_uploaded_file($_FILES["song"]["tmp_name"], $song_target);
        $sql="INSERT INTO tones(title,icon,song) VALUES('$title','$icon','$song')";
        $result = mysqli_query($con,$sql);
		if( $result )
		{
            $msg="Tone uploaded ;";
            echo "<h1> uploaded </h1>";
			header("location: home.php");
            #header('Location: ' . $_SERVER['HTTP_REFERER']);
            echo "<script>alert(".$msg.")</script>";
            
		}
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
    }
    else{
        echo "<h1> somedthing wrong </h1>";
    }
}

?>