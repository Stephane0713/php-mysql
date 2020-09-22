<?php

function minVal($a, $b, $c)
{
    $nb = $a;
    if ($nb > $b) {
        $nb = $b;
    } elseif ($nb > $c) {
        $nb = $c;
    }
    return $nb;
}
