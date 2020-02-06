<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
<?php

//1
$arrWom = [];
foreach($ss as $key){
    $nameAndSur = $key['first_name'].' '.$key['last_name'];


    if($key['gender']=='ж'){

        $arrWom[]=$nameAndSur;
    }
}
print_r($arrWom);
foreach($arrWom as $item){
    echo cong($item).'<br>';
}
function cong($name){
    return 'поздравляю с 8 марта,дорогая '.$name;
}

//2

function col(){
    return func_num_args();
}
echo col(1,2,3,5,6,0,2);

//3

$d = Date('w');
echo 'Date'.$d;
function getDay($num){

    $arrDay =[
        1=>'Понед',
        2=>'Вт',
        3=>'Ср',
        4=>'Чет',
        5=>'Пят',
        6=>'Суб',
        7=>'Вс'];
$count = count($arrDay);
//    foreach($arrDay as $item=>$val){
//        if($num == $item){
//            return $val;
//        }
//    }
//    for($i=1;$i<=$count;$i++){
//        if($num == $i){
//            return $arrDay[$i];
//        }
//    }
    $i=1;
    while($i<=$count){
        $i++;
        if($num == $i){
            return $arrDay[$i];
        }
    }

}
echo '<br>';
echo 'сегодня '.getDay($d);
echo '<br>';
echo '<br>';
//4

$arrN=[45,888,21,889, 9];
function findMax($arr){
    $max = $arr[0];
    $count = count($arr);
//    foreach($arr as $item) {
//        if ($item > $max) {
//            $max = $item;
//        }
//    }
//        for($i=0;$i<$count;$i++){
//            if($arr[$i]>$max){
//                $max = $arr[$i];
//            }
//        }
$i=0;
        while($i<$count){
            $i++;
            if($arr[$i]>$max){
                $max = $arr[$i];
            }
        }

    return $max;
}
echo findMax($arrN);
function findMin($arr){
    $min = $arr[0];
    foreach($arr as $item){
        if($item<$min){
            $min = $item;

        }

    }
    return $min;
}
echo '<br>';
echo findMin($arrN);


//5
$arrAy = [4,5,6,1,2,0,45];

function mysort($arr){
    $count = count($arr);
    $quantityIterations = $count-1;
    for($i=0;$i<$count;$i++){
        for($k=0;$k<$quantityIterations;$k++){
            if($arr[$k]>$arr[$k+1]){
list($arr[$k],$arr[$k+1])=array($arr[$k+1],$arr[$k]);
            }
        }

        $quantityIterations--;
    }
    return $arr;
}

function mysortWhile($arr){
    $count = count($arr);
    $quantityIterations = $count-1;
    $i=0;

    while($i<$count){
        $i++;

        for($k=0;$k<$quantityIterations;$k++){

            if($arr[$k]>$arr[$k+1]){
                list($arr[$k],$arr[$k+1])=array($arr[$k+1],$arr[$k]);
            }
        }

        $quantityIterations--;
    }
    return $arr;
}
print_r(mysortWhile($arrAy));
echo '<br>';
//2 уровень

$firstArr = ['ghgh', 'ytyttyt', 'uyuuuiyuy'];
$secondArr = ['fg', 'uyuy', 'gfg'];
function findMaxLen($arr1,$arr2){
$count = count($arr1);
    for($i=0;$i<=$count-1;$i++){
        $newarr[] = abs(strlen($arr1[$i])- strlen($arr2[$i]));

    }
    $maxLen = $newarr[0];
    foreach($newarr as $item){
        if($item>$maxLen){
            $maxLen = $item;
        }
    }

   print_r($newarr);
    return $maxLen;

}
echo findMaxLen($firstArr,$secondArr);


// курьер
function findFloor($flat,$floorQuant,$flPerfloor){
    $flatsPerSector = $floorQuant*$flPerfloor;
$sector = ceil($flat/$flatsPerSector);
$firstInSector = ($sector-1)*$flatsPerSector;
    for($i=$firstInSector,$floor=0;$i<$flat;$i+=$flPerfloor){
        $floor++;
    }
    echo 'Квартира находится на '.$floor.' этаже '.$sector.' подъезда';
    echo '<br>';
     return 1;
}
findFloor(168,8,4);