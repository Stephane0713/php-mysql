<?php
if(file_exists("count.txt")) {
    $count_r = fopen("count.txt", "r");
    $inc = (int)fread($count_r, 1);
    fclose($count_r);
    $inc++;
    $count_w = fopen("count.txt", "w");
    fwrite($count_w, $inc);
    fclose($count_w);
    echo "Visites : " . $inc;
    
} else {
    $count = fopen("count.txt", "w");
    fwrite($count, "1");
    fclose($count);
    echo "Visites : 1";
}