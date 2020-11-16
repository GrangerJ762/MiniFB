<?php
if(isset($_SESSION['id']) && isset($_POST['keyword'])){
    if(strlen($_POST['keyword']) > 2){
        $id = $_SESSION['id'];

        $login = preg_replace("#[^a-zA-Z ?0-9]#i", "", $_POST['keyword']);

        $sql = "SELECT * FROM user WHERE login like '%$login%' ";
        $q = $pdo->prepare($sql);
        $q->execute();
        while($line = $q->fetch()){
            $login = $line['login'];
            $id = $line['id'];
            echo "<div id='login'> <a href='index.php?action=profil&id=".$id."'>".$login."</a></div>";
        }
    } else {
        echo "recherche incomplète";
    }

}
?>
