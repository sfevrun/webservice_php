<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

include_once 'src/model/Taux.php';
include_once 'src/model/TauxManager.php';
use App\model\Taux;
use App\model\TauxManager;

$db = new PDO('mysql:host=localhost;dbname=brh', 'root', '');
$manager = new TauxManager($db); 

$data = json_decode(file_get_contents("php://input"));
$pa=new Taux();
$pa->setId_Banque($data->Id_Banque);
$pa->setAchat($data->Achat);
$pa->setVente($data->Vente);
$pa->setDateTaux($data->DateTaux);
$pa->setId_Devise($data->Id_Devise);
$pa->setCreatedBy($data->CreatedBy);
$pa->setDateCreated($data->DateCreated);
$pa->setModifiedBy($data->ModifiedBy);
$pa->setDateModify($data->DateModify);
//echo $pa->Achat();
if($manager->verifycreate($pa)){
    echo '{';
        echo '"message": "SUCCES."';
    echo '}';
}

else{
    echo '{';
        echo '"message": "Probleme."';
    echo '}';
}
?>