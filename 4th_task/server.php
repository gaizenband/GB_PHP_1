<?php
include "config.php";

function loadPage(){
    $sql = "select * from shop";
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