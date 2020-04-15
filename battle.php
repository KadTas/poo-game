<?php
require_once('player.php');
$i = 0;
$perso1 = new Character("Guerrier", 500, 50);
$perso2 = new Character("Yohann", 200, 50);

$perso1->introduction();
$perso2->introduction();

while (($perso1->getPV()>0) AND ($perso->getPV()>0))
{
    $i++;
    echo 'tour'.$turn;
$perso1->attack($perso2);
$perso2->damage();
$perso2->attack($perso1);
$perso1->damage();
}

if ($perso1->getPV()<=0) {
    echo $perso2->getNom(). 'a gagné !';
}
else {
    echo $perso1->getNom(). 'a gagné !';
}
?>