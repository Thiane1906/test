<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
require_once("../model/database.php");
class ContactModel extends Database
{


    public function getAllContacts()
    {
        return $this->getAll("contact");
    }
    public function getAllCategories()
    {
        return $this->getAll("categorie");
    }

    public function getContactId($id){
        return $this->getContactById($id);
    }
     
    public function insertContact($nom, $prenom, $categorie){
        return $this->insert($nom, $prenom, $categorie);
    }
   
}
