<?php
//1 уровень
define("FIVE",5);
for($i=1,$k=0;$i<=100;$i++){
if($i%FIVE ==0){
   $k++;
}
}
$i=1;
$k=0;
while($i<=100){
    if($i%FIVE ==0){
        $k++;
    }
    $i++;
}
do{
        if($i%FIVE ==0){
            $k++;
        }
        $i++;
}
while($i<=100);

echo 'rez - '.$k;
echo '<br>';
//2 уровень
define("COUNT_SIMPLE",100);

function check($num)
{
    $arr = range(2, $num - 1);
   // print_r($arr);
    foreach ($arr as $item) {
        if ($num % $item == 0) {
            return false;
        }
    }
}
function findSimple(){
    $arrayn=[1,2];
    for($i=3,$sum=0;count($arrayn)<COUNT_SIMPLE;$i++,$c++){
        if(check($i) !== false){
            $sum += $i;
            $arrayn[] = $i;
        }
    }
    echo $sum;
    return $arrayn;
}
//3 уровень
function checkEratosphen($num)
{
    for ($j=2;$i*$j<$num;$j++) {
        if ($num % $j == 0) {
            return false;
        }
    }
}
function findSimpleEratosphen(){
    $arrayn=[1,2];
    for($i=3,$sum=0;count($arrayn)<COUNT_SIMPLE;$i++,$c++){
        if(checkEratosphen($i) !== false){
            $sum += $i;
            $arrayn[] = $i;
        }
    }
    return $arrayn;
}


//print_r(findSimple());
echo '<br>';
echo $sum;
echo '<br>';
print_r(findSimpleEratosphen());
echo '<br>';

//1
function findSum($str){
    $arr= str_split($str,1);
    foreach($arr as $sym){
        $sum +=$sym;

    }
    return $sum;
}
echo findSum('12345');
echo '<br>';
//2
function findCount($str,$num){
    $arr= str_split($str,1);
    $count=0;
    foreach($arr as $sym){
        if($sym ==$num){
            $count++;
        }

    }
    return $count;

}
//echo findCount('123876453487657621245',5);
echo '<br>';
//3
function findArr($num){
    for($i=1;$i<=$num;$i++){
        if($num%$i==0){
            $arr[]=$i;
        }

    }
    return $arr;
}
print_r(findArr(40));
echo '<br>';
//4
function reduceName($stroka){
    $arr = explode(" ",ucwords($stroka));

$newArr=[$arr[0]];
    for($i=1;$i<=2;$i++){
        $key=substr($arr[$i],0,1).'.';
        $newArr[]=$key;
    }
    return implode(' ',$newArr);
}
var_dump(reduceName('ivanov Ivan Ivanovich'));

//5

function findCity($arr,$city){
      $i = count($arr);
    while($i>0){
        foreach($arr as $item=>$value){
            $lastLetter = $city[strlen($city)-1];
            if($lastLetter == 'ы' || $lastLetter == 'ь'){
                $lastLetter = $city[strlen($city)-2];
            }
            $firstLetter = substr($value,0,1);
            if($firstLetter == ucfirst($lastLetter)){
                $index = $item;
                $city = $value;
                $newarr[]=$value;
                unset($arr[$index]);
            }
        }

        $i=count($arr);
    }
    return $newarr;
}
$myArray = ['Donetsk', 'Volgograd','Vena', 'Kharkiv', 'Alushta'];
print_r(findCity($myArray,'Kyiv'));
