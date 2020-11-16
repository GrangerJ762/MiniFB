<?php
//die();
  if((isset($_POST["titre"])) && (isset($_POST["contenu"]))){

// -- UTILISATEUR ACTIF --
    $id = $_SESSION['id'];

// -- INSCRIPTION DU POST DANS LA BDD --
    $sql = "INSERT INTO ecrit(titre,contenu,dateEcrit,idAuteur,idAmi) VALUES(?,?,NOW(),?,1) ";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST["titre"],$_POST["contenu"],$id));
  }


 ?>
