<?php

//1
function df($myStr, $file = 'log/MyLog.txt'){
$file_arrays = file($myStr);
$info = $file_arrays[0].' '.date("Y-m-d G:i:s");
$newFile = fopen($file, 'r+');
fwrite($newFile,$info);

fclose($newFile);
return 1;
}


//2
function units($first, $second, $third, $count = 1){
    $info='';
    if($count - round($count,-1) ==1){
        $info= "$count $first";
    }elseif($count%10 >=2 && $count%10<=4 && ($count%100 >=20 || $count%100<10)){
        $info= "$count $second";
    }else{
        $info= "$count $third";
    }
    return $info;
}

echo units('Ноутбук', 'Ноутбука', 'ноутбуков',5);
echo '<br>';
//3
function EditData ($data){
    $mes = array(
        "01" => "января",
        "02" => "Февраля",
        "03" => "марта",
        "04" => "апреля",
        "05" => "мая",
        "06" => "июня",
        "07" => "июля",
        "08" => "августа",
        "09" => "сентября",
        "10" => "октября",
        "11" => "ноября",
        "12" => "декабря"
    );
$arrData = explode('.',$data);
$d = ($arrData[0]<10)?substr($arrData[0], 1):$arrData[0];
$newData=$d." ".$mes[$arrData[1]]." ".$arrData[2];

    return $newData;
}
echo EditData('23.02.2020');
//4
$glOne = 12;
$glTwo = 13;

function sumCust(){
    global $glOne;
    global $glTwo;
    return $glOne + $glTwo;
}
echo sumCust();

//5
$a = 1;
function Mine(){
    static $b=0;
    global $a;
    $b +=$a;
    return $b;
}

echo '<br>'.Mine();
echo '<br>'.Mine();
echo '<br>'.Mine();

//6
$fir = 1;
$sec=2;
$tr=3;
unset($fir);
echo $fir;
unset($sec,$tr);
echo $sec,$tr;

//7
//1)внутри функции $a не видна, нужна инструкция global перед $a
//2) $b локальная, не видна снаружи функции,
// чтоб вывести ее,нужно прописать echo $b в функции

//8
function m_func($n,$m){
    return $n*$m;
}

echo 'result-  '.m_func(3,6);



//9
$oneS = 6;
$twoS = 3;
$trS = 10;
echo $oneS*$twoS*$trS;//180
function linkgfg(&$one,&$two,$three){
    $one = 5;
    $two= 6;
}
linkgfg($oneS,$twoS,100);
echo 'new rez-  '.$oneS*$twoS*$trS;//300-фуенкция изменила аргументы по ссылке за своими пределами

//10
function myCalc()
{
    $rez = 1;
    for ($i = 0; $i < func_num_args(); $i++) {
        $rez *= func_get_arg($i);
    }
    return $rez/func_num_args();

}

echo 'result-  '.myCalc(8,5,2);
echo '<br>';
// вывести числа Фибоначи

function fib($n)
{
    if ($n < 3) {
        return 1;
    } else {
        return fib($n - 1) + fib($n - 2);
    }
}

for($n=1;$n<=16;$n++){
    echo fib($n).'';

}


