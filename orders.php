<?php
include "config.php";
$user_id = $_GET['userId'];

if(isset($_GET['adress'])){
    $adress = $_GET['adress'];
    $sql = "INSERT INTO orders(id_user,id_item,price,adress)
        select cart.id_user, cart.id_item, shop.price * cart.count,'$adress'
        from cart
        INNER JOIN shop on cart.id_item = shop.id
        where cart.id_user = $user_id
        ";
    $sql_2 = "delete from cart where id_user = $user_id";
    $query = mysqli_query($GLOBALS['connection'],$sql);
    $query_2 = mysqli_query($GLOBALS['connection'],$sql_2);
    if($query && $query_2){
        echo 'Success';
    }else{
        echo (mysqli_error($GLOBALS['connection']));
    }
} elseif (isset($_GET['newStatus'])) {
    $orderDate = $_GET['date'];
    $newStatus = $_GET['newStatus'];

    $sql = "update orders set order_status = $newStatus where date_created = '$orderDate'";
    $query = mysqli_query($GLOBALS['connection'],$sql);
    if($query){
        echo "Done";
    }else{
        echo (mysqli_error($GLOBALS['connection']));
    }
} elseif(isset($_GET['date'])){
    $orderDate = $_GET['date'];
    $sql = "update orders set order_status = 3 where id_user = $user_id and date_created = '$orderDate'";
    $query = mysqli_query($GLOBALS['connection'],$sql);
    if($query){
        echo "Item has been deleted";
    }else{
        echo (mysqli_error($GLOBALS['connection']));
    }

}elseif ($user_id == 1){
    $sql = "select * from orders";
    $query = mysqli_query($GLOBALS['connection'],$sql);
    if($query){
        $data = [];
        while($assocData = mysqli_fetch_assoc($query)){
            array_push($data,$assocData);
        }
        echo json_encode($data);
    }else{
        echo (mysqli_error($GLOBALS['connection']));
    }
}else {
    $sql = "select * from orders where id_user = $user_id";
    $query = mysqli_query($GLOBALS['connection'],$sql);
    if($query){
        $data = [];
        while($assocData = mysqli_fetch_assoc($query)){
            array_push($data,$assocData);
        }
        echo json_encode($data);
    }else{
        echo (mysqli_error($GLOBALS['connection']));
    }
}


