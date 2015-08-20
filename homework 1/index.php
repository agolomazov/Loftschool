<?php
//Task 1
echo '<h1>Task 1</h1>';

function list_array($array)
{
    if(is_array($array)){
        foreach($array as $item)
        {
            echo '<p>'.$item .'</p>';
        }
    }else{
        echo 'It\'s not array';
    }
}

$php_frameworks = array('Codeigniter','Yii','Kohana','Phalcon','ZF');
list_array($php_frameworks);

//Task 2
echo '<h1>Task 2</h1>';

function minus($numbers)
{
    $result = $numbers[0];
    for ($i = 1; $i < count($numbers); $i++)
        $result -= $numbers[$i];
    return $result;
}

function devide($numbers)
{
    $result = $numbers[0];
    for ($i = 1; $i < count($numbers); $i++)
        if ($numbers[$i] != 0){
            $result /= $numbers[$i];
        }
    return $result;
}

function calc($num, $string)
{
    switch ($string)
    {
        case '+':
            echo "Summ = ".array_sum($num);
            break;
        case '-':
            echo "difference = ".minus($num);
            break;
        case '*':
            echo  "multiplication = " . array_product($num);
            break;
        case '/':
            echo "quotient = " . devide($num);
            break;
        default:
            echo 'Try another action: +, -, *, /';
    }

}

$numbers = array(20,8,2,2);
// Choose action: +, -, *, /
$action = '+';
calc($numbers,$action);

//task 3
echo '<h1>Task 3</h1>';

function foo($action, ...$num)
{
    if(is_string(func_get_arg(0))){
        calc($num,$action);
    }else{
        echo 'First argument of fucntion must have type STRING ';
    }
}
//Check
foo('-',1,2,3,4);

//task 4
echo '<h1>Task 4</h1>';

function table($cols,$rows)
{
    if (is_int($cols) && is_int($rows)) {
        echo '<table border="1" cellpadding="10">';
        for ($i = 1; $i <= $rows; ++$i) {
            if($i==1){
                echo '<tr bgcolor="#CFE2F3">';
            }else{
                echo '<tr>';
            }
            for ($j = 1; $j <= $cols; ++$j){
                if($j==1){
                    echo '<td bgcolor="#FFF2CC">', $i*$j, '</td>';
                }else{
                    echo '<td>', $i*$j, '</td>';
                }
            }
            echo '</tr>';
        }
        echo '<table>';
    }else{
        echo 'Arguments must be INT';
    }
}

//Check
table(4,3);
//Task 5
echo '<h1>Task 5</h1>';

function sort_numbers($numbers)
{
    $result = array();
    for ($i = 1; $i < count($numbers); $i++){
        array_unshift( $result , $numbers[$i]) ;
    }
    sort($result);
    return $result;
}

$array = array(1,22,5,66,3,57);
$sort_array = sort_numbers($array);

//Check
var_dump($sort_array);

//Task 6
echo '<h1>Task 6</h1>';

function foo_odd($a, $b) {

    if($a < $b){
        if($a % 2 == 0){
            foo_odd($a+1,$b);
        }

        if($a % 2 != 0 ){
            echo $a . '<br/>';
            foo_odd($a+2,$b);
        }
    }


}
//Check
foo_odd(10,35);

//Task 7
echo '<h1>Task 7</h1>';

function utf8_strrev($str)
{
    preg_match_all('/./us', $str, $ar);
    return join('', array_reverse($ar[0]));
}

function is_palindrome($word)
{
    if(is_string($word))
    {
        $word = strtolower($word);
        $reverse = utf8_strrev($word);
        if ($word == $reverse)
            return true;
        else
            return false;
    }
}

//Check
$word = "raceqcar";
$cheack_polindrom = is_palindrome($word);

var_dump($cheack_polindrom);

?>

