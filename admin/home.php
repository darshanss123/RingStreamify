<?php
    session_start();
    if(!$_SESSION['id']){
        header('location: login.php');
    }
    include '../db/connect.php';
    include '../db/services.php';
    $result = getTones();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | Home</title>
        <link rel="stylesheet" href="../css/home.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
       
    </head>
<body>
    <?php include "navbar.php"; ?>
    
<div class="table-container">
    <div>
        <h2 class="table-title">Song List</h2>
       <a href="upload.php"><button class="add">+ Create</button></a>
    </div>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>File</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 0; 
      if(!$result){
        echo "<tr><td> No data available..! Upload file using Create button on top right corner</td></tr>";
    } else{
      while($rows = $result -> fetch_assoc()){ ?>  
      <tr>
        <td><?php echo $i += 1?></td>
        <td><?php echo $rows['title'] ?></td>
        <td><?php echo $rows['song'] ?></td>
        <td><a href="../db/delete.php?id=<?php echo $rows['id'];?>"> <button class='delete'>Delete</button></a></td>
      </tr>
      <?php 
      }   
    } ?>
    </tbody>
  </table>
</div>

    
</body>
</html>