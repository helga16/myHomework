<?php 

//1 задача
$lang = 'en';
if($lang == 'ru'){
    $arr = array('пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс');
}else{
    $arr = array('mn', 'ts', 'wd', 'th', 'fr', 'st', 'sn');

}
switch($lang){
    case 'ru':
        $arr = array('пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс');
        break;
    case 'en':
        $arr = array('mn', 'ts', 'wd', 'th', 'fr', 'st', 'sn');
        break;
}
$arr = ($lang == 'ru')? array('пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'): array('mn', 'ts', 'wd', 'th', 'fr', 'st', 'sn');
print_r($arr);

//2 задача

$month = rand(1,12);
echo $month;
if($month <=2 || $month ==12){
    echo "зимний месяц";
}elseif($month >=3 && $month <=5){
    echo "весенний месяц";
}elseif($month >5 && $month <=8){
    echo "летний месяц";
}else{
    echo "осенний месяц";
}
echo '<br>';
switch ($month){
    case ($month <=2 || $month ==12):
        echo "зимний месяц";
        break;
    case ($month >2 && $month <=5):
        echo "весенний месяц";
        break;
    case ($month >5 && $month <=8):
        echo "летний месяц";
        break;
    case ($month >8 && $month <=11):
        echo "осенний месяц";
        break;

}
echo '<br>';
echo ($month <=2 || $month ==12)?"зимний месяц":(($month >2 && $month <=5)?"весенний месяц":(($month >5 && $month <=8)?"летний месяц":"осенний месяц"));
echo '<br>';

//3 задача

$minutes = rand(1,59);
echo $minutes;
if($minutes <=1 && $minutes <=15){
    echo "первая четверть";
}elseif($minutes >15 && $minutes <=30){
    echo "вторая четверть";
}elseif($minutes >30 && $minutes <=45){
    echo "третья четверть";
}else{
    echo "четвертая четверть";
}
echo '<br>';
switch ($minutes){
    case ($minutes <=1 && $minutes <=15):
        echo "первая четверть";
        break;
    case ($minutes >15 && $minutes <=30):
        echo "вторая четверть";
        break;
    case ($minutes >30 && $minutes <=45):
        echo "третья четверть";
        break;
    case ($minutes >45 && $minutes <=60):
        echo "четвертая четверть";
        break;

}
echo '<br>';
echo ($minutes <=1 && $minutes <=15)?"первая четверть":(($minutes >15 && $minutes <=30)?"вторая четверть":(($minutes >30 && $minutes <=45)?"третья четверть":"четвертая четверть"));
echo '<br>';

//4 задача
$a = 2;
if($a==0 || $a ==2){
    $a +=7;
}else{
    $a /=10;
}
echo $a;
echo '<br>';
echo ($a==0 || $a ==2)? $a+=7:$a/=10;
switch ($a){
    case ($a==0 || $a ==2):
        $a +=7;
        break;
    default:
        $a/=10;
        break;
}
echo $a;
echo '<br>';

//5 задача

$b=3;
echo '<br>';
if($a <=1 && $b >= 3){
    echo $a+$b;
}else{
    echo $a - $b;
}
switch($a){
    case($a <=1 && $b >= 3):
echo $a+$b;
break;
default:
       echo $a - $b;
        break;
}
echo ($a <=1 && $b >= 3)? $a+$b: $a - $b;
//задачу fizz-buzz
$number = 1;
$firstNumber = 2;
$secondNumber = 5;
$thirdNumber = 18;
$str ='';
echo '<br>';
while($number<= $thirdNumber){

    if(!($number%$firstNumber) && !($number%$secondNumber)){
        $str .= 'FB';
    }elseif(!($number%$firstNumber)){
        $str .= 'F';}
    elseif (!($number%$secondNumber)) {
        $str .= 'B';
    }else {
        $str .= "$number";
    }
    $number ++;

 }
 echo '<br>';
echo $str;