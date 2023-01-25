<?php
include('config/session.php');
include('config/database.php');

$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);

$loggedUser = $_SESSION["user_id"];
$objs = json_decode(file_get_contents('php://input'));

if ($loggedUser) {
    $stmt = $dbh->prepare("INSERT INTO orders VALUES(null,?,?,?)");
    $dbh->beginTransaction();
    $stmt->execute(array($loggedUser, 0, date('y/m/d')));
    $lastId = $dbh->lastInsertId();
    $dbh->commit();
    foreach ($objs as $obj) {
        $stmt = $dbh->prepare("INSERT INTO detailorders VALUES(null,?,?,?,?,?)");
        $stmt->execute(array($lastId, $obj->id, $obj->price, $obj->quantity, 0));
    }
} else {
    echo "alert('Usuário não está logado');";
    header("Location: " . INCLUDE_PATH . "admin");
    exit;
}
