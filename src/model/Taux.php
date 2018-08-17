<?php
namespace App\model;
class Taux
{
  private $_Id_Taux;
  private $_Id_Banque;
  private $_Achat;
  private $_Vente;
  private $_DateTaux;
  private $_Id_Devise;
  private $_CreatedBy;
  private $_DateCreated;
  private $_ModifiedBy;
  private $_DateModify;
  public function __construct()
  {
   
  }
  public function Id_Taux() { return $this->_Id_Taux; }
  public function Id_Banque() { return $this->_Id_Banque; }
  public function Achat() { return $this->_Achat; }
  public function Vente() { return $this->_Vente; }
  public function DateTaux() { return $this->_DateTaux; }
  public function Id_Devise() { return $this->_Id_Devise; }
  public function CreatedBy() { return $this->_CreatedBy; }
  public function DateCreated() { return $this->_DateCreated; }
  public function ModifiedBy() { return $this->_ModifiedBy; }
  public function DateModify() { return $this->_DateModify; }

  public function setId_Taux($Id_Taux)
  {
    // L'Identifiant.
    $this->_Id_Taux =  $Id_Taux;
  }
        
  public function setId_Banque($Id_Banque)
  {
         $this->_Id_Banque = $Id_Banque;
  
  }

  public function setAchat($Achat)
  {
  
      $this->_Achat = $Achat;
   
  }

  public function setVente($Vente)
  {
     $this->_Vente = $Vente;
    }

  public function setDateTaux($DateTaux)
  {
     $this->_DateTaux = $DateTaux;
   
  }

  public function setId_Devise($Id_Devise)
  {
   
      $this->_Id_Devise = $Id_Devise;
   
  }

   public function setCreatedBy($CreatedBy)
  {
    $this->_CreatedBy= $CreatedBy;
  }


  public function setDateCreated($DateCreated)
  {
     $this->_DateCreated = $DateCreated;
   
  }

  public function setModifiedBy($ModifiedBy)
  {
   
      $this->_ModifiedBy = $ModifiedBy;
   
  }

   public function setDateModify($DateModify)
  {
    $this->_DateModify=  $DateModify;
  }
}
?>




  