<?php
    $salt = "lxfjn1";
    $path="img/".$_FILES['image']['name'].$salt;
    if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
        header("Location: index.php");
    }
?>