<?php

require_once('class_personnage.php');
echo "<br><br><center><h1>Final Fantasy POO</h1></center>";

echo ("<center><br><br>======================================<br>");
echo "A vous de jouer !<br>";
echo ("======================================<br>");
echo ('<a href="#resultat">Voir le résultat</a><br></center>');

// Entrer un nom de joueur J1
$nomPersonnage1 = 'Kagiri';
$joueur1 = new NIN($nomPersonnage1);
$joueur1->setStatsNIN();
$joueur1->affiche();

// Entrer un nom de joueur J2
$nomPersonnage2 = 'Y Shtola';
$joueur2 = new BLM($nomPersonnage2);
$joueur2->setStatsBLM();
$joueur2->affiche();
echo ("<center><br><br>======================================<br>");
echo "<br>  A qui le tour ? <br><br> ";
echo ("======================================<br></center>");


do{
  echo "lancer de des du joueurs 1<br>";
  $des1 = $joueur1->jeuxDeDes();
  echo "lancer de des du joueurs 2<br>";
  $des2 = $joueur2->jeuxDeDes();
  echo "Résultat : J1 = ".$des1." , J2 = ".$des2." <br><br>";

  if ($des1>$des2){
    echo ("<center><br><br>======================================<br>");
    echo "<br>  Le Joueur 1 Commence <br><br> ";
    echo ("======================================<br></center>");
    $aquidejouer = 0;
  }else if ($des1<$des2){
    echo ("<center><br><br>======================================<br>");
    echo "<br>  Le joueur 2 Commence <br><br> ";
    echo ("======================================<br></center>");
    $aquidejouer = 1;
  }else {
    echo "Le lancé de des est équivalent, on recommence <br><br>";
  }


} while ($des1 == $des2);

$i=1;
$j=1;
$nbtour=1;
while(($joueur1->getpointDeVie() > 0) && ($joueur2->getpointDeVie() > 0) && ($nbtour<=60) ){
if ($aquidejouer <= 0){
  echo "<center><br><br>========================<br>";
  echo "Tour n°".$i." Joueur 1 : ".$joueur1->getnomPersonnage().", ".$joueur1->getNameClass()." :";
  echo "<br>========================<br><br></center>";
 // attaque joueur 1 -> joueur 2
  $pointattaque = $joueur1->getpointDAttaque();
  $pointattaque = $joueur1->Attaque($pointattaque);
  echo "Points de défense adversaire : ".$joueur2->getpointDeDefense()."<br>";
  $joueur2->recevoirAttaque($pointattaque);
  $i++;
  $aquidejouer = $aquidejouer +1;
  echo"<br>";
}else{
  echo "<center><br><br>========================<br>";
  echo "Tour n°".$j." Joueur 2 : ".$joueur2->getnomPersonnage().", ".$joueur2->getNameClass()." :";
  echo "<br>========================<br><br></center>";

  // attaque joueur 2 -> joueur 1
  $pointattaque = $joueur2->getpointDAttaque();
  $pointattaque = $joueur2->Attaque($pointattaque);
  echo "Points de défense adversaire : ".$joueur1->getpointDeDefense()."<br>";
  $joueur1->recevoirAttaque($pointattaque);
    $aquidejouer = $aquidejouer -1;
  $j++;
  echo"<br>";
  $nbtour++;
}
}
  echo'<div id="resultat"></div>';
if($joueur1->getpointDeVie() <= 0){
  echo "<center><br><br>========================<br>";
  echo "LE JOUEUR N° 2 A GAGNÉ !!!!!!:";
  echo "<br>========================<br><br></center>";
}else if ($joueur2->getpointDeVie() <= 0){
  echo "<center><br><br>========================<br>";
  echo "LE JOUEUR N° 1 A GAGNÉ !!!!!!:";
  echo "<br>========================<br><br></center>";

}else{
  echo "<center><br><br>========================<br>";
  echo "Le combat n'en finit pas.";
  echo "<br>========================<br><br></center>";


}
echo ('<center><a href="?'.rand().'=#resultat" onclick="reload()">Réessayer</a></center>'); //refresh en bas de page
?>