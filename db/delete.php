<?php
    include "connect.php";
    $id = $_GET['id'];
    $query = "DELETE FROM tones WHERE id = '$id'";
    $result = $con -> query($query) or die($error);
    if($result){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else{
        echo $error;
    }
?>