<?php
    include 'db/connect.php';
    include 'db/services.php';
    $result = getTones();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RingTone Downloader | Home</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php include "navbar.php"; ?>
<div class="container">
    <div class="row">
        <!-- <table> -->
            <!-- <tr> -->
            <?php $i = 0; 
                 if(!$result){
                        echo "<tr><h1> New Ring Tones Coming Soon..! </h1></tr>";
                } else{
                     while($rows = $result -> fetch_assoc()){ ?>
                   
                <div class="col col-sm-3">
                <div class="card custom-card">
                    <h2 class="card-title"><?php echo $rows['title']?></h2>
                    <img class="card-img-top" onclick="play('<?php echo $rows['id']?>')" style="height: 220px;" src="icons/<?php echo $rows['icon']?>" width="200px" alt="icon"> <br>
                    <audio id="<?php echo $rows['id']?>" src="songs/<?php echo $rows['song']?>"></audio>
                    <button class="btn btn-primary" onclick="play('<?php echo $rows['id']?>')"> <span class="material-icons">play_circle_outline</span> </button> 
                    <button class="btn btn-danger" onclick="stop('<?php echo $rows['id']?>')"><span class="material-icons">stop</span></button>
                    <a href="songs/<?php echo $rows['song']?>" class="btn btn-success" download><span class="material-icons">download_for_offline</span></a>
                </div>
                </div>
                <?php }}?>
            <!-- </tr> -->
        <!-- </table> -->
    </div>
</div>
    <script>
        var playing = false;
        function play(id){
           var song = document.getElementById(id);
            if(!playing){
                song.play();
                playing = true;
            } else{
                song.pause();
                playing = false;
            }
        }
        function stop(id){
            var song = document.getElementById(id);
            song.pause();
            song.currentTime = 0;
            playing = false;
        }
        
    </script>
</body>
</html>