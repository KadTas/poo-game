<?php

class Character 
{
    private $_atk;
    private $_nom;
    private $_pv;

    public function __construct($_nom, $_pv, $_atk)
    {
        $this->nom = $_nom;
        $this->pv = $_pv;
        $this->atk = $_atk;
    }
    public function introduction()
    {
            var_dump("En garde ! Je suis $this->nom et j'ai $this->atk en attaque, $this->pv pv !");
    }
}

$perso1 = new Character("guerrier", 500, 50);
$perso1->introduction();

?>