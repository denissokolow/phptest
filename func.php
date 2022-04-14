<?php

include 'db.php';

//payments 
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

//pattern
$contragent = $_POST['contragent'];
$var_one = $_POST['var_one'];
$adress = $_POST['adress'];
$var_two = $_POST['var_two'];
$naznachenie = $_POST['naznachenie'];
$var_three = $_POST['var_three'];
$valuta = $_POST['valuta'];
$statya = $_POST['statya'];

$get_id = $_GET['id'];
$get_statya = $_GET['statya'];

//Create payments
if (isset($_POST['add'])) {
    $sql = ("INSERT INTO payments (id, type, time, organization, partner, in_currency, out_currency, appointment, article, project) VALUES (?, ?, ?, ?, ?, ?, ? , ?, ?, ?)");
    $query = $pdo->prepare($sql);
    $query->execute([$id, $type, $time, $organization, $partner, $in_currency, $out_currency, $appointment, $article, $project]);
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

//Create patterns
if (isset($_POST['create_st'])) {
    $sql = ("INSERT INTO pattern (id, part, var_one, adress, var_two, appoint, var_three, in_curr, artic) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query = $pdo->prepare($sql);
    $query->execute([$id, $contragent, $var_one, $adress, $var_two, $naznachenie, $var_three, $valuta, $statya]);
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

//Update payments
if (isset($_POST['upd_pay'])) {
    $sql = ("UPDATE payments SET article = '$statya'  
             WHERE ((partner = '$contragent' $var_one project = '$adress') 
             AND ('$naznachenie' $var_two (appointment)) 
             AND ('$valuta' $var_three (in_currency)))");
    echo $sql;
    $query = $pdo->prepare($sql);
    $query->execute();
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

//Update payments for filter
if (isset($_POST['use_filter'])) {
    //get var_one
    $sql = $pdo->prepare("SELECT var_one FROM pattern WHERE id = '$get_id'");
    $sql->execute();
    $v1 = $sql->fetch(PDO::FETCH_COLUMN);

    //get var_two
    $sql = $pdo->prepare("SELECT var_two FROM pattern WHERE id = '$get_id'");
    $sql->execute();
    $v2 = $sql->fetch(PDO::FETCH_COLUMN);

    //get var_three
    $sql = $pdo->prepare("SELECT var_three FROM pattern WHERE id = '$get_id'");
    $sql->execute();
    $v3 = $sql->fetch(PDO::FETCH_COLUMN);

    $sql = ("UPDATE payments SET article = (SELECT artic FROM pattern WHERE id = '$get_id') 
             WHERE ( (partner = (SELECT part FROM pattern WHERE id = '$get_id')) 
             $v1 (project = (SELECT adress FROM pattern WHERE id = '$get_id'))
             AND ( (SELECT appoint FROM pattern WHERE id = '$get_id') $v2 (appointment) )
             AND ( (SELECT in_curr FROM pattern WHERE id = '$get_id') $v3 (in_currency) ) )
            ");
    $query = $pdo->prepare($sql);
    $query->execute();
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

//Read all payments
$sql = $pdo->prepare("SELECT * FROM payments");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

//Read all patterns
$sql = $pdo->prepare("SELECT * FROM pattern");
$sql->execute();
$res_pat = $sql->fetchAll(PDO::FETCH_OBJ);

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

//Delete platji
if (isset($_POST['delete'])) {
    $sql = ("DELETE FROM payments WHERE id = ?");
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

//Delete filter
if (isset($_POST['delete_st'])) {
    $sql = ("DELETE FROM pattern WHERE id = ?");
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
