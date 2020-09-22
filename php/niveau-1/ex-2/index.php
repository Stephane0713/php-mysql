<?php

function somme($a, $b)
{
    return $a + $b;
};

echo '<p>' . somme(1, 2) . '</p>';
echo '<p>' . somme(3, 4) . '</p>';

function soustraction($a, $b)
{
    return $a - $b;
};

echo '<p>' . soustraction(4, 3) . '</p>';
echo '<p>' . soustraction(1, 2) . '</p>';

function multiplication($a, $b)
{
    return $a * $b;
};

echo '<p>' . multiplication(4, 3) . '</p>';
echo '<p>' . multiplication(1, 2) . '</p>';
