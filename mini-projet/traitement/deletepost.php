<?php

$id = $_GET["id"];
$idAuteur = $_GET["idAuteur"];

if($_SESSION['id'] == $idAuteur){
$requete="DELETE FROM ecrit WHERE id=?";
$q = $pdo->prepare($requete);
$q->execute([$id]);
}
 
?>
