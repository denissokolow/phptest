<?php

$host = 'b91184ue.beget.tech';
$db = 'b91184ue_phptest';
$user = 'b91184ue_phptest';
$pass = 'Root123!';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo 'Ошибка подключения к БД'.$e-> getMessage();
}
