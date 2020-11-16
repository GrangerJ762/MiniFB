<?php
if(isset($_SESSION['id'])){
    if(!isset($_GET['id'])){
        $id = $_SESSION['id'];
    } else {
        $id = $_GET['id'];
    }

        $sql = "SELECT * FROM user WHERE id=?";
        $q = $pdo->prepare($sql);
        $q->execute([$id]);

        $line = $q->fetch();
            $login = $line['login'];
            $avatar = $line['avatar'];
            echo "<div id='login'> Pseudo : ".$login."</div>";
            echo "<div id='avatar'> avatar : <img src='".$avatar."' alt='".$avatar."' /></div>";

             
}
?>