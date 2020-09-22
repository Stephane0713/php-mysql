<?php

$date = date("d-m-Y H:i:s");

if (!isset($_COOKIE["visit"])) {
    $arr = $date;
    setcookie("visit", $arr, time() + 12);

    echo "<p>C'est votre première visite : " . $date . "</p>";
} else {
    $arr = explode(";", $_COOKIE["visit"]);

    echo "<p>Vous avez visité ce site ". (count($arr) + 1) . "</p>";
    echo "<ul>";
    foreach($arr as $elt) {
        echo "<li>" . $elt . "</li>";
    }
    echo "<li>" . $date . "</li>";
    echo "</ul>";

    array_push($arr, $date);
    $arr = implode(";", $arr);
    setcookie("visit", $arr, time() + 12);
}
