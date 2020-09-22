<?php

class Ville
{
    public $nom;
    public $departement;

    public function getInfo()
    {
        return "La ville $this->nom se trouve dans le département $this->departement<br>";
    }
}

$ville1 = new Ville();
$ville1->nom = "Nantes";
$ville1->departement = "Loire Atlantique";

$ville2 = new Ville();
$ville2->nom = "Lyon";
$ville2->departement = "Rhône";

echo $ville1->getInfo();
echo $ville2->getInfo();
