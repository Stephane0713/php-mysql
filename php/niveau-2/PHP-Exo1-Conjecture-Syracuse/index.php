<?php 

function reduce($int) {
    if($int < 1 || !is_int($int)) {
        echo "<p>Argument must be an INTEGER larger than 0</p>";
    } else {
        $val = $int;
        while($val > 1) {
            if($val % 2 == 0) {
                $val = $val / 2;
                echo '<p>'.$val.'</p>';
            } else {
                $val = $val * 3 + 1;
                echo '<p>'.$val.'</p>';
            }
        }
    }
};


reduce(30);
reduce(0);
reduce("at");