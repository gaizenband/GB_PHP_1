<?php
include "config.php";

function loadPage(){
        $sql = "select * from images order by click_count desc";
        $query = mysqli_query($GLOBALS['connection'],$sql);
        if($query){
            $data = [];
            while($assocData = mysqli_fetch_assoc($query)){
                array_push($data,$assocData);
            }
            return $data;
        }else {
            echo mysqli_error($GLOBALS['connection']);
        }
}

if($_GET['action'] == 'load'){
    $salt = "lxfjn1";
    $imgName = $_FILES['image']['name'].$salt;
    $path="img/".$imgName;
    $imgSize = $_FILES['image']['size'];


    $sql = "insert into images(name,path,size,click_count) values('$imgName','$path','$imgSize',0)";
    $query = mysqli_query($GLOBALS['connection'],$sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'],$path) && $query){
        header("Location: index.php");
    } else {
        echo mysqli_error($GLOBALS['connection']);
    }
}

if(isset($_POST['functionname'])){
    $sql = "update images set click_count =  click_count + 1 where id = $_POST[arguments]";
    mysqli_query($GLOBALS['connection'],$sql);  
}
