<?php

class Database
{
    private $host;
    private $userName;
    private $dbName;
    private $password;
    private $conn;

    public function __construct()
    {
        $this->host="localhost";
        $this->userName="root";
        $this->dbName ="test";
        $this->password="thia2001";
        try {
            $this->conn =new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->userName, $this->password);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
           echo "pas de connexion".$e->getMessage();
        }
    }
    public function getAll($table){
        $query="SELECT * FROM $table";
        $req=$this->conn->prepare($query) ;
        $req->execute();
        return $req->fetchAll();
    }
    public function getContactById($id)
    {
        $requete = "SELECT * FROM contact WHERE id= :id";
        $req = $this->conn->prepare($requete);
        $req->bindParam(":id", $id);
        $req->execute();
        return $req->fetchAll();
    }
    public function insert($nom, $prenom, $categorie)
    {
        $query = "INSERT INTO `contact`(`nom`, `prenom`, `categorie`)
        VALUES (:nom, :prenom, :categorie)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':categorie', $categorie);

        $stmt->execute();
    }
    public function update($colonne,$id){
        $query = "UPDATE  `contact` SET $colonne=:$colonne where id = $id" ;
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":".$colonne, $colonne);
        $stmt->execute();
    }
}