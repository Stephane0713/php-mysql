<?php
include("impot.php");

if (isset($_GET["submit"])) {
    $name = $_GET["name"];
    $income = $_GET["income"];

    $person1 = new Impot($name, $income);
    $person1->calculateTax();
    echo $person1->showTax();
} else {
    header("Location: index.php");
}
