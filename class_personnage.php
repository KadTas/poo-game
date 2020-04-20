<?php

class Personnage
{
// Declaration de variable
  protected $_nomPersonnage;
  protected $_pointDeDefense;
  protected $_pointDAttaque;
  protected $_pointDAttaqueINFO;
  protected $_pointDeVie;


  //Initialisation de notre Classe
  public function __construct($nomPersonnage) {
    $this->_nomPersonnage = $nomPersonnage;
    $this->_pointDeDefense;
    $this->_pointDAttaque;
    $this->_pointDAttaqueINFO;
    $this->_pointDeVie;
  }

  public function getnomPersonnage(){
    return $this->_nomPersonnage;
  }

  public function getpointDeDefense(){
    return $this->_pointDeDefense;
  }

  public function getpointDAttaque(){
    return $this->_pointDAttaque;
  }

  public function getpointDeVie(){
    return $this->_pointDeVie;
  }

  public function setStatsNIN(){ 
      $this->_pointDeVie = 300;
      $this->_pointDeDefense = 32;
      $this->_pointDAttaque = rand(70,75);
      $this->_pointDAttaqueINFO =  "70-75";
  }
  public function setStatsBLM(){ 
    $this->_pointDeVie = 400;
    $this->_pointDeDefense = 43;
    $this->_pointDAttaque = rand(45, 55);
    $this->_pointDAttaqueINFO =  "45-55";
    
}

  public function jeuxDeDes() { //jet de des
      $var= rand(1,6);
      return $var;
  }

  public function affiche() {
      echo ("<center>======================================<br>");
      echo ("Personnage crée du nom de : ".$this->_nomPersonnage." <br><br> Ses Caractéristiques sont : <br>");
      echo ("- Classe : ".$this->getNameClass()."<br>");
      echo ("- Nombre de Points d'attaque : ".$this->_pointDAttaqueINFO."<br>");
      echo ("- Nombre de Points de défense : ".$this->_pointDeDefense."<br>");
      echo ("- Nombre de Points de vie : ".$this->_pointDeVie."<br>");
      echo ("======================================<br></center>");
  }



}

class NIN extends Personnage{ //Classe ninja
  private $_limitbreak;
  private $_nomclasse;

  public function __construct($nomPersonnage) {
    parent::__construct($nomPersonnage);
    $this->_limitbreak = 0;
    $this->_nomclasse = "Ninja";
  }

  public function getNameClass(){
    return $this->_nomclasse;
  }

  public function Attaque($pointdattaque){  //fonction attaque
    echo "limitbreak : ".$this->_limitbreak." %.<br>";
    if($this->_limitbreak==100){
      $pointdattaque=$pointdattaque * 2;
      $this->_limitbreak = 0;
      echo"<br>La Limit Break est déclenchée<br>";
      echo"Dégats doublés !<br>";
      echo"".$pointdattaque."<br> de dégats infligés";
    }
    else{
      echo"Dégâts infligés : ".$pointdattaque."<br>";
    }
    return $pointdattaque;
}

public function recevoirAttaque($pointdattaque){ //fonction réception de degats
  $pointdattaque= $pointdattaque - $this->_pointDeDefense;
  if($pointdattaque > 0){
    $this->_pointDeVie = $this->_pointDeVie - $pointdattaque;
    if($this->_pointDeVie < 0){$this->_pointDeVie = 0;}
    $this->_limitbreak += ceil($pointdattaque/2);
    if($this->_limitbreak>100){$this->_limitbreak=100;}
    echo "----------<br> 
    Points de vie enlevés à ".$this->_nomPersonnage." : ".$pointdattaque."<br> 
    Points de vie restants à ".$this->_nomPersonnage." : ".$this->_pointDeVie;
  }else {
    echo "----------<br>";
    echo "L'adversaire s'est protégé.";
  }
}

}

class BLM extends Personnage{ //classe démoniste
  private $_fluxether;
  private $_nomclasse;

  public function __construct($nomPersonnage) {
    parent::__construct($nomPersonnage);
    $this->_fluxether = 0;
    $this->_nomclasse = "Mage Noir";
  }

  public function getNameClass(){
    return $this->_nomclasse;
  }

  public function Attaque($pointdattaque){ //fonction d'attaque
    echo "flux d ether : ".$this->_fluxether." %.<br>";
    if($this->_fluxether==100){
      $pointdattaque=$pointdattaque * 2;
      $this->_fluxether=0;
      echo"<br>Les éléments sont déchainés, le flux d ether est au max !<br>";
      echo"Coup critique !<br>";
      echo"Dégâts infligés : ".$pointdattaque."<br>";
    }
    else{
      echo"Dégâts infligés : ".$pointdattaque."<br>";
    }
    return $pointdattaque;
}

public function recevoirAttaque($pointdattaque){ //fonction de reception des degats
  $pointdattaque= $pointdattaque - $this->_pointDeDefense;
  if($pointdattaque > 0){
    $this->_pointDeVie = $this->_pointDeVie - $pointdattaque;
    if($this->_pointDeVie < 0){$this->_pointDeVie = 0;}
    $this->_fluxether += ceil($pointdattaque/2);
    if($this->_fluxether > 100){$this->_fluxether==100;}
    echo "----------<br> 
    Points de vie enlevés à ".$this->_nomPersonnage." : ".$pointdattaque."<br> 
    Points de Vie restants à ".$this->_nomPersonnage." : ".$this->_pointDeVie;
  }else {
    echo "----------<br>";
    echo "L'adversaire s'est protégé.";
  }
}

  }




?>
