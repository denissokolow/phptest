<?php

include 'db.php';

$type = $_POST['type'];
$id = $_POST['id'];
$time = $_POST['time'];
$organization = $_POST['organization'];
$partner = $_POST['partner'];
$in_currency = $_POST['in_currency'];
$out_currency = $_POST['out_currency'];
$appointment = $_POST['appointment'];
$article = $_POST['article'];
$project = $_POST['project'];

$get_id = $_GET['id'];

//Create

if (isset($_POST['add'])){
    $sql = ("INSERT INTO payments (id, type, time, organization, partner, in_currency, out_currency, appointment, article, project) VALUES (?, ?, ?, ?, ?, ?, ? , ?, ?, ?)");
    $query = $pdo->prepare($sql);
    $query->execute([$id, $type, $time, $organization, $partner, $in_currency, $out_currency, $appointment, $article, $project]);
    if ($query){
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

//Read All
$sql = $pdo->prepare("SELECT * FROM payments");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

//Read Tip documenta
$sql = $pdo->prepare("SELECT * FROM tipdoc");
$sql->execute();
$result_tip = $sql->fetchAll(PDO::FETCH_OBJ);

//Read Organizations
$sql = $pdo->prepare("SELECT * FROM organizations");
$sql->execute();
$result_org = $sql->fetchAll(PDO::FETCH_OBJ);

//Read Contragents
$sql = $pdo->prepare("SELECT * FROM contragents");
$sql->execute();
$result_cont = $sql->fetchAll(PDO::FETCH_OBJ);

//Read Valuta
$sql = $pdo->prepare("SELECT * FROM valuts");
$sql->execute();
$result_val = $sql->fetchAll(PDO::FETCH_OBJ);

//Read Naznacheniya
$sql = $pdo->prepare("SELECT * FROM naznacheniya");
$sql->execute();
$result_naz = $sql->fetchAll(PDO::FETCH_OBJ);

//Read Statya
$sql = $pdo->prepare("SELECT * FROM statyi");
$sql->execute();
$result_sta = $sql->fetchAll(PDO::FETCH_OBJ);

//Delete

if (isset($_POST['delete'])){
    $sql = ("DELETE FROM payments WHERE id = ?");
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    if ($query){
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}