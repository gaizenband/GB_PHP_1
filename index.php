<meta charset="UTF-8">
<?php
/*
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true? Из-за приведения типов, то есть '05' при сравнении равно 5
    var_dump((int)'012345');     // Почему 12345? Преобразование число отбрасывает 0 в начале по правилам математики
    var_dump((float)123.0 === (int)123.0); // Почему false? Потому что float - с плавающей точкой, а int - нет, сравниваются в т.ч. и типы - они не совпадают
    var_dump((int)0 === (int)'hello, world'); // Почему true? Потому что выдается 0, при преобразовании в число текста (если нет цифры в начале)
//Задание 5

$a = 1;
$b = 2;

$a = $b;
$b /= $b;
var_dump("a = ".$a." b = ".$b);

//Функция превращения 2 в 1, и 1 в 2
function testFunc($n){
    echo(3-$n);
}

*/

// //Lesson 2
// //№1
// $a = 1;
// $b = 5;

// function compare($a,$b){
//     if($a>0 && $b>0){
//         echo($a-$b);
//     }else if($a<0 && $b<0){
//         echo($a*$b);
//     }else{
//         echo($a+$b);
//     }
// }

// compare($a,$b);

// echo('<br>');

// //№2
// $a = 5;

// function showInts($n){
//     switch ($n) {
//         case 0:
//             echo(0 .'<br>');
//         case 1: 
//             echo(1 .'<br>');
//         case 2:
//             echo(2 .'<br>');
//         case 3:
//             echo(3 .'<br>');
//         case 4:
//             echo(4 .'<br>');
//         case 5:
//             echo(5 .'<br>');
//         case 6:
//             echo(6 .'<br>');
//         case 7:
//             echo(7 .'<br>');
//         case 8:
//             echo(8 .'<br>');
//         case 9:
//             echo(9 .'<br>');
//         case 10:
//             echo(10 .'<br>');
//         case 11:
//             echo(11 .'<br>');
//         case 12:
//             echo(12 .'<br>');
//         case 13:
//             echo(13 .'<br>');
//         case 14:
//             echo(14 .'<br>');
//         case 15:
//             echo(15);                                                                             
//     }
// }
// showInts($a);


// //№3

// function add($a,$b){
//     return $a+$b;   
// }
// function sub($a,$b){
//     return $a-$b;   
// }
// function mul($a,$b){
//     return $a*$b;   
// }
// function div($a,$b){
//     return $a/$b;   
// }

// //№4
// function mathOperation($a,$b,$operation){
//     switch ($operation) {
//         case '+':
//             echo(add($a,$b));
//         break;
//         case '-':
//             echo(sub($a,$b));
//         break;
//         case '*':
//             echo(mul($a,$b));
//         break;
//         case '/':
//             echo(div($a,$b));
//         break;                        
//     }
// }

// //№6
// function power($val,$pow){
//     if($pow == 0){
//         return 1;
//     }
//     return $val * power($val, $pow-1);
// }

// echo('<br>'.power(3,3));//27


// //№7
// function timeFormat(){
//     $hours = date('H');
//     $minutes = date('i');
//     $minStr = strval($minutes);

//     if ($hours == 2 || $hours == 3 || $hours == 4 || $hours == 22 || $hours == 23){
//         $hoursText = 'часа';
//     }elseif($hours == 1 || $hours == 21){
//         $hoursText = 'час';
//     } else {
//         $hoursText = 'часов';
//     }

//     if($minutes == 0 || $minutes >= 5 && $minutes <= 20 || substr($minStr,1) >= 5 && substr($minStr,1) <= 9){
//         $minText = 'минут'; 
//     }elseif (substr($minStr,1) == '1') {
//         $minText = 'минута'; 
//     } else {
//         $minText = 'минуты'; 
//     }

//     echo ('<br>'.$hours.' '.$hoursText.' '.$minutes.' '.$minText);
// }
// timeFormat();


// Lesson 3
echo "=================== №1 ===================<br>";
// №1 
function divOnThree(){
    $i = 0;
    while ($i<=100){
        if (!($i%3)){
            echo $i."<br>";
        }
        $i++;
    }
}
divOnThree();
echo "=================== №2 ===================<br>";
// №2
function calcEven(){
    $i = 0;
    do {
        if (!$i){
            echo $i." - ноль.<br>";
        } elseif (!($i % 2)){
            echo $i." - четное число.<br>";
        } else {
            echo $i." - нечетное число.<br>";
        }
        ++$i;
    } while ($i <= 10);
}
calcEven();

echo "=================== №3 ===================<br>";
// №3
$regions = [
    "Московская область" => [
        "Москва",
        "Зеленоград",
        "Клин"
    ],
    "Ленинградская область" => [
        "Санкт-Петербург",
        "Всеволожск",
        "Павловск",
        "Кронштадт"
    ],
    "Ростовская область" => [
        "Ростов на дону",
        "Азов",
        "Таганрог"
    ],
];
foreach ($regions as $key => $value) {
    echo "$key:<br>".implode(", ",$value)."<br>";
}

echo "=================== №4-5-9 ===================<br>";
// №4-5-9
$transliteration = [
    "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
    "е"=>"e", "ё"=>"yo","ж"=>"j","з"=>"z","и"=>"i",
    "й"=>"i","к"=>"k","л"=>"l", "м"=>"m","н"=>"n",
    "о"=>"o","п"=>"p","р"=>"r","с"=>"s","т"=>"t",
    "у"=>"y","ф"=>"f","х"=>"h","ц"=>"c","ч"=>"ch",
    "ш"=>"sh","щ"=>"sh","ь"=>"'","ы"=>"i","ъ"=>"'","э"=>"e","ю"=>"u",
    "я"=>"ya"," "=>"_"
];
function translate($str){
    $lowerStr = mb_strtolower($str);
    return $lowerStr." = ".strtr($lowerStr, $GLOBALS["transliteration"]);
}
echo translate("Вкусные пельмешки")."<br>";

echo "=================== №7 ===================<br>";
// №7
for($i = 0; $i <= 9; print $i++."<br>");

echo "=================== №8 ===================<br>";
// №8
function getValuesK($mas){
    $result = "";
    foreach ($mas as $value) {
        if(mb_substr(mb_strtolower($value),0,1) == 'к'){
            $result .= $value;
        }
    }
    if (!$result){
        $result = "Нет городов на букву К";
    }
    return $result;
}

foreach ($regions as $key => $value) {
    echo "$key:<br>".
    getValuesK($value)
    ."<br>";
}
?>