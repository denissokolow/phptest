<?php

include 'db.php';

//Read table PATTERN - RESULT
$sql = $pdo->prepare("SELECT * FROM pattern");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

//Read table PAYMENTS - RESPAY
$sql = $pdo->prepare("SELECT * FROM payments");
$sql->execute();
$respay = $sql->fetchAll(PDO::FETCH_OBJ);