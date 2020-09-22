<?php

function premierElementTableau($arr = null)
{
    return $arr ? $arr[0] : 'null';
};

echo '<p>' . premierElementTableau([1, 2, 3]) . '</p>';
echo '<p>' . premierElementTableau() . '</p>';

function dernierElementTableau($arr = null)
{
    return $arr ? $arr[count($arr) - 1] : 'null';
};

echo '<p>' . dernierElementTableau([1, 2, 3]) . '</p>';
echo '<p>' . dernierElementTableau() . '</p>';

function plusGrand($arr = null)
{
    $max = $arr[0];
    if ($arr) {

        for ($i = 0; $i < count($arr); $i++) {
            if ($max < $arr[$i]) {
                $max = $arr[$i];
            }
        }
    } else {
        $max = 'null';
    }
    return $max;
};

echo '<p>' . plusGrand([1, 2, 3]) . '</p>';
echo '<p>' . plusGrand() . '</p>';

function plusPetit($arr = null)
{
    $min = $arr[0];
    if ($arr) {

        for ($i = 0; $i < count($arr); $i++) {
            if ($min > $arr[$i]) {
                $min = $arr[$i];
            }
        }
    } else {
        $min = 'null';
    }
    return $min;
};

echo '<p>' . plusPetit([1, 2, 3]) . '</p>';
echo '<p>' . plusPetit() . '</p>';
