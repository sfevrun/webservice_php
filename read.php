<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once 'src/model/Taux.php';
include_once 'src/model/TauxManager.php';
use App\model\TauxManager;

$db = new PDO('mysql:host=localhost;dbname=brh', 'root', '');

$manager = new TauxManager($db); 

    $taux= $manager->getList();
    echo json_encode($taux);

?>