<?php 

function estIlMajeur($int) {
    $isTrue = $int >= 18 ? 'True' : 'False';
    return $isTrue;
};

echo "<p>".estIlMajeur(17)."</p>";
echo "<p>".estIlMajeur(19)."</p>";

function plusGrand($x, $y) {
    $max = $x;
    if($y > $max) {
        $max = $y;
    };
    return $max;
};

echo "<p>".plusGrand(1, 2)."</p>";
echo "<p>".plusGrand(3, 4)."</p>";

function plusPetit($x, $y) {
    $min = $x;
    if($y < $min) {
        $min = $y;
    };
    return $min;
};

echo "<p>".plusPetit(1, 2)."</p>";
echo "<p>".plusPetit(3, 4)."</p>";

function lePlusPetit($x, $y, $z) {
    $min = $x;
    if($y < $min) {
        $min = $y;
    } elseif($z < $min) {
        $min = $z;
    };
    return $min;
};

echo "<p>".lePlusPetit(1, 2, 3)."</p>";
echo "<p>".lePlusPetit(4, 5, 6)."</p>";