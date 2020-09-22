<?php

$notes = [
"Roger" => 12,
"Monica" => 16,
"Najat" => 15,
];
print_r($notes);
echo "<br>";

$notes["Anton"] = 10;
print_r($notes);
echo "<br>";

unset($notes["Monica"]);
print_r($notes);
echo "<br>";

function noteMin($arr) {
    $min = 20;
    foreach($arr as $note) {
        if($note < $min) {
            $min = $note;
        }
    }
    return $min;
}

echo "Note minimal : " . noteMin($notes);
echo "<br>";

function noteMax($arr) {
    $max = 0;
    foreach($arr as $note) {
        if($note > $max) {
            $max = $note;
        }
    }
    return $max;
}

echo "Note maximal : " . noteMax($notes);
echo "<br>";

ksort($notes);
print_r($notes);
echo "<br>";

arsort($notes);
print_r($notes);
echo "<br>";

function moyenne($arr) {
    $sum = 0;
    foreach($arr as $elt) {
        $sum += $elt;
    }
    return $sum / count($arr);
}

echo "La moyenne de la classe est : " . moyenne($notes);
echo "<br>";