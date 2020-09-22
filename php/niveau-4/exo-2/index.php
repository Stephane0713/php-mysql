<?php
class Ville
{
    private $nom;
    private $departement;

    public function __construct($nom, $departement)
    {
        $this->nom = $nom;
        $this->departement = $departement;
    }

    public function getinfo()
    {
        return "La ville $this->nom se trouve dans le département $this->departement<br>";
    }
}

$ville1 = new Ville("Nantes", "Loire Atlantique");
$ville2 = new Ville("Lyon", "Rhône");

echo $ville1->getinfo();
echo $ville2->getinfo();
