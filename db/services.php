<?php
    function getTones(){
        include 'connect.php';
        $query = "SELECT * FROM tones ORDER BY created DESC";
        $result = $con -> query($query);
        if( mysqli_num_rows($result) > 0 ){
            return $result;
        }
    }
?>