<?php
//1

$arrInt = [122,106,22,4,199];
print_r($arrInt);
echo '<br>';
function findLargest(&$arr){
    $largest = $arr[0];
    foreach($arr as $key=>$val){
        if($val>=$largest){
            $largest = $val;
            $largestKey = $key;
        }
    }
    unset($arr[$largestKey]);
    return $largest;
}

echo findLargest($arrInt);
echo '<br>';
print_r($arrInt);
echo '<br>';




//2
echo '<br>'.'2 task';
function findLongestStr(&$arr){
    foreach($arr as $key=>$value){
        if(strlen($value)>=strlen($longest)){
            $longest = $value;
            $longestKey = $key;
        }
    }
    unset($arr[$longestKey]);
    return $longest;
}
$arrStr = ['qee', 'et', '', 'fggfgf'];
echo '<br>';
print_r($arrStr);
echo '<br>';
echo findLongestStr($arrStr).'<br>';



//3
$arrSort = [];
foreach($ss as $key){
    $nameAndSur = $key['first_name'].' '.$key['last_name'];
    array_push($arrSort, $nameAndSur);
}
    asort($arrSort);
    foreach ($arrSort as $item){
        echo $item.'<br>';
    }
//вывод телефонов мужчин
foreach($ss as $key){
    $pos = strpos($key['tel'], '38095');

    if($key['gender']=='м'){
        if($pos != false){
            echo $key['first_name'].'- '.$key['tel'].'<br>';
        }
    }
}

//2 уровень

$newArr = ['kevin', 'jack', 'jonK', 'kkk'];
function findSymb($arr,$symbol){
    $quantitySymb = 0;
    $arrnew = str_split(implode('',$arr),1);
    print_r($arrnew);
    foreach($arrnew as $key){
        if(strtolower($key) == $symbol){
            $quantitySymb ++;
        }
    }
    return $quantitySymb;

}
echo '<br>';
echo 'rezult =   '.findSymb($newArr, 'k');
