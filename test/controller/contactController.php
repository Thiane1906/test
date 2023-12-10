<?php
require_once("../model/contact.class.php");
class Contact
{
    private $contact;
    public function __construct()
    {
        $this->contact = new ContactModel();
    }
    public function displayContact()
    {
        $contacts = $this->contact->getAllContacts("contact");
        require_once("../view/contact.html.php");
        return $contacts;
    }

    public function displayCategorie()
    {
        $categories = $this->contact->getAllCategories();
        var_dump($categories);
        require_once("../view/contact.html.php");
        return $categories;

    }

    public function showContactById($id)
    {

        return $this->contact->getContactId($id);
       
    }
    public function insertContact()
    {
        $data=json_decode(file_get_contents('php://input'), true);
        var_dump($data);
        $this->contact->insertContact($data['nom'],$data['prenom'],$data['categorie']);
        
    }
}
