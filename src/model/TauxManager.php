<?php
namespace App\model;
use App\model\Menu;
use PDO;
class TauxManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }
  public function verifycreate(Taux $mn)
  {
  
    $q = $this->_db->prepare('SELECT * FROM tbl_taux where DateTaux =:DateTaux and Id_Devise=:Id_Devise and Id_Banque=:Id_Banque limit 1');
  $q->bindValue(':DateTaux', $mn->DateTaux());
    $q->bindValue(':Id_Devise', $mn->Id_Devise());
    $q->bindValue(':Id_Banque', $mn->Id_Banque());
    $q->execute();
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
   // die("Achat : " .$donnees['Achat']);
    if($donnees){
      $mn->setId_Taux($donnees['Id_Taux']);
     return $this->update($mn);
      }
      else{
       return $this->create($mn);
      }
     
  }

  public function create(Taux $mn)
  {
  
    $q = $this->_db->prepare('insert  into tbl_taux(Id_Banque,Achat,Vente,DateTaux,Id_Devise,CreatedBy,DateCreated,ModifiedBy,DateModify) values (:Id_Banque,:Achat,:Vente,:DateTaux,:Id_Devise,:CreatedBy,:DateCreated,:ModifiedBy,:DateModify)');

    $q->bindValue(':Id_Banque', $mn->Id_Banque());
    $q->bindValue(':Achat', $mn->Achat());
    $q->bindValue(':Vente', $mn->Vente());
    $q->bindValue(':DateTaux', $mn->DateTaux());
    $q->bindValue(':Id_Devise', $mn->Id_Devise());
    $q->bindValue(':CreatedBy', $mn->CreatedBy());
    $q->bindValue(':DateCreated', $mn->DateCreated());
    $q->bindValue(':ModifiedBy', $mn->ModifiedBy());
    $q->bindValue(':DateModify', $mn->DateModify());
   // die($mn->Achat().''.$mn->Vente());
  // $q->execute();
  // return true;
 if($q->execute()){
     return true;
  }

  return false;
  }
  public function getList()
  {
    $mns = [];

    $q = $this->_db->query('SELECT * FROM tbl_taux ORDER BY Id_Taux desc');
    if(!$q)
    {
      die("Execute query error, because: ". print_r($this->_db->errorInfo(),true) );
    }
    //success case
    else{
      $aRowout=array();
          $aRowout = $q->fetchAll(PDO::FETCH_ASSOC);
      return $aRowout;
  }
  }

  public function update(Taux $mn)
  {
    $q = $this->_db->prepare('UPDATE  tbl_taux SET Achat = :Achat, Vente = :Vente, ModifiedBy = :ModifiedBy, DateModify = :DateModify  WHERE Id_Taux = :Id_Taux');
  
    $q->bindValue(':Achat', $mn->Achat());
    $q->bindValue(':Vente', $mn->Vente());
     $q->bindValue(':ModifiedBy', $mn->ModifiedBy());
    $q->bindValue(':DateModify', $mn->DateModify());
    $q->bindValue(':Id_Taux', $mn->Id_Taux());
   if($q->execute()){
     return true;
   }
   return false;
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>