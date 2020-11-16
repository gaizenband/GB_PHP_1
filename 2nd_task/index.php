<?php
if(isset($_POST['number_1']) && isset($_POST['number_2'])){
    $num1 = $_POST['number_1'];
    $num2 = $_POST['number_2'];
    $result;
    switch ($_POST['action']) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            $result = $num1 / $num2;
            break;   
    }
}
?>


<form action="#" method="post">
    <input type="number" name="number_1" id="num_1" value="<?=$num1?>">
    <input type="submit" name="action" value="+">
    <input type="submit" name="action" value="-">
    <input type="submit" name="action" value="*">
    <input type="submit" name="action" value="/">
    <input type="number" name="number_2" id="num_2"  value="<?=$num2?>">
    <p class="result"><?= $result ?></p>    
</form>


