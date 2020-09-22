<?php
class personne
{
    private $nom;
    private $prenom;
    private $adresse;

    //Constructeur
    public function __construct($nom, $prenom, $adresse)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
    }

    //Destructeur
    public function __destruct()
    {
        echo "<script type=\"text/javascript\">alert('La personne nommée $this->prenom $this->nom \\n est supprimée de vos contacts')</script>";
    }

    public function getPersonne()
    {
        return "$this->nom $this->prenom, $this->adresse";
    }

    public function setadresse($new)
    {
        $this->adresse = $new;
    }
}

$client = new personne("Geelsen", "Jan", " 145 Rue du Maine Nantes");
echo $client->getPersonne();

echo "<br>";

$client->setadresse("23 Avenue Foch Lyon");
echo $client->getPersonne();

echo "<br>";
unset($client);
echo "Fin du script";
