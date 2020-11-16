<?php

var_dump($_POST);
var_dump($_FILES);

  if(isset($_POST["login"]) && isset($_POST["mdp"]) && isset($_POST["email"]) && isset($_FILES["avatar"])){

    $uploaddir = 'images/';
    $uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
    move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile);

    $sql = "INSERT INTO user(login, mdp, email, avatar) VALUES(?, PASSWORD(?), ?, ?) ";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST["login"], $_POST["mdp"], $_POST["email"], $uploadfile));


  }
 ?>
