<?php

include("config/config.php");
include("config/db.php"); // commentaire
include("divers/balises.php");
include("config/actions.php");
session_start();
ob_start(); // Je démarre le buffer de sortie : les données à afficher sont stockées


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Facebook</title>




    <!-- Ma feuille de style à moi -->
    <link href="./css/style.css" rel="stylesheet">

    <script src="js/jquery-3.2.1.min.js"></script>
</head>

<body>

<?php
if (isset($_SESSION['info'])) {
    echo "<div>
          <strong>Information : </strong> " . $_SESSION['info'] . "</div>";
    unset($_SESSION['info']);
}
?>


<header>
    <h3>Mini Facebook</h3>
</header>
<nav>
    <ul>
        <li><a href="index.php?action=page2">Va voir la page 2</a></li>

        <?php
        if (isset($_SESSION['id'])) {
            echo "<li>Bonjour " . $_SESSION['login'] . " <a href='index.php?action=deconnexion'>Deconnexion</a></li>";
        } else {
            echo "<li><a href='index.php?action=login'>Login</a></li>";
        }
        ?>
        <li><a href="index.php?action=creation">Creation de compte</a></li>
        <li><a href="index.php?action=post">Post</a></li>
        <?php
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            echo "<li><a href='index.php?action=profil&id=".$id."'>Profil</a></li>";
        }
        ?>
        <li><a href="index.php?action=membre">Liste Membres</a></li>
    </ul>
</nav>
            <?php
            // Quelle est l'action à faire ?
            if (isset($_GET["action"])) {
                $action = $_GET["action"];
            } else {
                $action = "accueil";
            }

            // Est ce que cette action existe dans la liste des actions
            if (array_key_exists($action, $listeDesActions) == false) {
                include("vues/404.php"); // NON : page 404
            } else {
                include($listeDesActions[$action]); // Oui, on la charge
            }

            ob_end_flush(); // Je ferme le buffer, je vide la mémoire et affiche tout ce qui doit l'être
            ?>


            <?php
// ------------------------------- POST ------------------------------------------------------
            $ecrit = "SELECT * FROM ecrit";
            $query = $pdo->prepare($ecrit);
            $query->execute();
            while($line = $query->fetch()){
                $titre = $line['titre'];
                $date = $line['dateEcrit'];
                $contenu = $line['contenu'];
                $id = $line['id'];
                $idAuteur = $line['idAuteur'];
                echo "<br />";
                echo $titre." ------ ".$date." -------- <a href='index.php?action=deletepost&id=".$id."&idAuteur=".$idAuteur."'>Delete</a>";
                echo "<br />";
                echo $contenu;
                echo "<br />";
                echo "<br />";
            }



             ?>

<footer>Le pied de page</footer>
</body>
</html>
