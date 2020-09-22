<?php 

function HelloWorld() {
    return 'Hello World!';
};

echo '<p>'.HelloWorld().'</p>';

function quiEstLeMeilleurProf() {
    return 'Mon super formateur de dev web';
};

echo '<p>'. quiEstLeMeilleurProf() .'</p>';

function jeRetourneMonArgument($arg) {
    return $arg;
};

echo '<p>'. jeRetourneMonArgument("Allo !?");

function concatenation($a, $b) {
    return $a . $b;
};

echo '<p>'. concatenation("Kung-fu", "Panda"). '</p>';

function concatenationAvecEspace($a, $b) {
    return $a . " " . $b;
};

echo '<p>'.concatenationAvecEspace("Kung-fu","Panda").'</p>';