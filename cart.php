<?php
include "config.php";
$user_id = $_GET['userId'];

if(isset($_GET['id']) && !isset($_GET['delete'])){
    $productId = $_GET['id'];
    

    $sql = "select * from cart where id_item = $productId and id_user = '$user_id'";
    $query = mysqli_query($GLOBALS['connection'],$sql);
    if(isset($_GET['count'])){
        $count = $_GET['count'];
        $updateSql = "update cart set count = $count where id_item = $productId and id_user = '$user_id'";
    }elseif(mysqli_num_rows($query) > 0){
        $updateSql = "update cart set count = count + 1 where id_item = $productId and id_user = '$user_id'";
    } else {
        $updateSql = "insert into cart(id_item, count, id_user) VALUES($productId, 1, $user_id)";
    }
    $changeQuery = mysqli_query($GLOBALS['connection'],$updateSql);

    if(!$changeQuery) {
        echo mysqli_error($GLOBALS['connection']);
    }
}

if(isset($_GET['id']) && isset($_GET['delete'])){
    $productId = $_GET['id'];
    $sql = "delete from cart where id_item = $productId and id_user = '$user_id'";
    $query = mysqli_query($GLOBALS['connection'],$sql);
    if(!$query) {
        echo mysqli_error($GLOBALS['connection']);
    }
}

$getCartItems = "select * from cart where id_user = '$user_id'";
$queryGetCart = mysqli_query($GLOBALS['connection'],$getCartItems);

if($queryGetCart){
    $data = [];
    while($assocData = mysqli_fetch_assoc($queryGetCart)){
        array_push($data,$assocData);
    }
    echo json_encode($data);
}