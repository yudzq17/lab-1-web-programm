<?php
/* Imagine a lot of code here */
$very_bad_unclear_name = "15 chicken wings";


// Write your code here:
$order =& $very_bad_unclear_name;
$order.= " from kfc is the best dish";


// Don't change the line below
echo "\nYour order is: $very_bad_unclear_name.";
echo "\n";

//task 2 - chisla
$a = 78;
echo "\n$a";
$b = 6.5;
echo "\n$b";
$c = $a / $b;
echo "\n$c";
$last_month = 1187.23;
$this_month = 1089.98;
$d = $last_month - $this_month;
echo "\nНасколько больше я потратил в прошлом месяце, чем в этом месяце? На $d ";
echo "\n";
echo "\n";

//task 11 - umnozhenie and delenie
$num_languages = 4;
$months = 11;
$days = $months * 16;
$days_per_language = $days/$num_languages;
echo "сколько дней в среднем у нее ушло на изучение каждого языка? $days_per_language";
echo "\n";
echo "\n";

//task  12 - stepen
echo 8**2;
echo "\n";
echo "\n";

//task 13 - operator prisvoenija
$my_num = 2;
$answer = $my_num;
$answer += 2;
$answer *= 2;
$answer -= 2;
$answer /= 2;
$answer -= $my_num;

echo "\nРЕзультат: $answer";
echo "\n";
echo "\n";

// task 14 -math functions
$a= 10;
$b= 3;
$m = $a%$b;
if($m === 0)
    echo "Делится";
else
    echo "Делится с остатком, остаток равен $m";

$st = pow(2,10);
echo "\n$st";
$sq = sqrt(245);
echo"\n$sq";
$array = [4, 2, 5, 19, 13, 0, 10];
$sum = 0;
foreach ($array as $value) {
    $sum += $value ** 2;
}
$sq2 = sqrt($sum);
echo "\n$sq2";

echo "\nКорень квадратный из 379: ", sqrt(379);
echo "\nРезультат округлен до целых: ", round(sqrt(379));
echo "\nРезультат округлен до десятых: ", round(sqrt(379), 1);
echo "\nРезультат округлен до сотых: ", round(sqrt(379), 2);

echo "\nКорень квадратный из 587: ", sqrt(579);
$round = ["floor" => floor(sqrt(587)), "ceil" => ceil(sqrt(587))];
echo "\nОкругление в меньшую сторону: ", $round["floor"];
echo "\nОкругление в большую сторону: ", $round["ceil"];
$array =[4, -2, 5, 19, -130, 0, 10];
$mina = min($array);
$maxa = max($array);
echo "\nМинимальный $mina, максимальный $maxa";

echo"\nРандомное число: ", rand(1,100);
$cnt = 0;
$arr = [];
echo"\nМассив с рандомными чисалми: ";
while ($cnt < 10) {
    Array_push($arr, rand());
    $cnt += 1;
}
foreach($arr as $chisla) echo "$chisla ";

$a = 10;
$b = 11;
$abs = abs($a-$b);
echo "\nМодуль разности: $abs";
echo"\nТрансформер массив: ";
$arrrr = [1, 2, -1, -2, 3, -3];
$newarrr = array_map('abs',$arrrr);
foreach($newarrr as $chiselki) echo "$chiselki ";

$ch = 30;
echo"\nДелители числа $ch: ";
$ar30 = [];
for ($i = 1; $i <= $ch; $i++)
    if ($ch%$i === 0)
        Array_push($ar30, $i);
foreach($ar30 as $chissla) echo "$chissla ";

$num = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$sum = 0;
$cnt = 0;
while ($sum<=10){
    $sum += $num[$cnt];
    $cnt += 1;
}
echo"\nЧтобы сумма была больше 10 нужно сложить $cnt первых чисел";
echo "\n";

//task 15 - functions1
function printStringReturnNumber($string): int {
    echo "\n$string";
    return 52;
}
$myNum = printStringReturnNumber("Строка: ");
echo "Мое число = $myNum";
echo "\n";
echo "\n";

//task 16 - func2
function increaseEnthusiasm($string): string {
    return $string."!";
}
$mystring = increaseEnthusiasm("я смирнов игорь");
echo $mystring;
echo "\n";
function repeatThreeTimes($string): string{
    return str_repeat($string, 3);
}
$mystring = repeatThreeTimes(" я смирнов игорь");
echo $mystring;
echo "\n", increaseEnthusiasm(repeatThreeTimes(" я смирнов игорь"));

function cut($str, $length = 10)
{
    return substr($str, 0, $length);
}
echo "\n", cut("igor", 2);
function printArray($arr, $index = 0) {
    if ($index < count($arr)) {
        echo $arr[$index] . " ";
        printArray($arr, $index + 1);
    }
}
$array = [1, 2, 3, 4, 5];
echo"\n",printArray($array);

function sumcifrinschisl($int){
    $sum = 0;
    while ($int > 0)
    {
        $sum += $int % 10;
        $int = (int)($int / 10);
    }
    if ($sum > 9)
    {
        return sumcifrinschisl($sum);
    }
    return $sum;
}
$chislo = sumcifrinschisl(12345);
echo "\n",$chislo;
echo "\n";

//task 17
function fillArray($value, $cnt)
{
    $array = [];
    for ($i = 0; $i < $cnt; $i++)
    {
        $array[] = str_repeat($value, $i + 1);
    }
    return $array;
}

foreach (fillArray("x", 5) as $stolbik) echo "\n$stolbik";

$array =  [[1, 2, 3], [4, 5], [6]];
function Sum(array $arr): int {
    $cnt = 0;
    foreach ($arr as $array) {
        foreach ($array as $chisla) {
            $cnt += $chisla;
        }
    }
    return $cnt;
}
echo"\nСумма элементов: ",Sum($array);

$array = [];
$count = 1;
for ($i = 0; $i < 3; $i++) {
    $subArray = [];
    for ($j = 0; $j < 3; $j++) {
        $subArray[] = $count++;
    }
    $array[] = $subArray;
}
foreach ($array as $subArray) {
    echo "\n";
    echo "[";
    $lastIndex = count($subArray) - 1;
    foreach ($subArray as $index => $value) {
        echo $value;
        if ($index !== $lastIndex) {
            echo ", ";
        }
    }
    echo "]";
}

$array = [2, 5, 3, 9];
$result = ($array[0] * $array[1]) + ($array[2] * $array[3]);
echo "\nРезультат сложения произведений: $result";

$user = ['name' => 'Игорь', 'surname' => 'Смирнов', 'patronymic' => 'Александрович'];
echo "\nНе узнали меня, это же я ", $user['surname'] . ' ' . $user['name'] . ' ' . $user['patronymic'];

$date = ['year' => date('Y'), 'month' => date('m'), 'day' => date('d')];
echo "\n",$date['year'] . '-' . $date['month'] . '-' . $date['day'];

$arr = ['a', 'b', 'c', 'd', 'e'];
echo "\nКоличество элементов массива: ",count($arr);
echo"\n";
echo"Последний и предпоследний: $arr[4],$arr[3]";