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
    public function getNom()
    {
            return $this->nom;
    }
    public function getPV()
    {
            return $this->pv;
    }
    public function getAtk()
    {
            return $this->atk;
    }
    public function setPV($vie)
    {
              $this->pv = $vie;
    }
    public function introduction()
    {
            echo 'Yo !';
            echo '<br>';
    }
    public function attack($ennemi)
    {
           $PVperdus = $ennemi->getPV();
           $PVperdus = $PVperdus - $this->atk;
           $ennemi->setPV($PVperdus);
           echo $this->nom." frappe ".$ennemi->getNom."<br>";
    }
    public function damage()
    {
            echo $this->nom." a ".$this->pv." PV <br>";
    }
}
?>