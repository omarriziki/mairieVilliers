<?php
class Inscription_m
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    /////////////////////////////////////////////////////////INSCRIPTION////////////////////////////////////////////////
    public function inscription($data)
    {
        $this->db->query('INSERT INTO utilisateurs (prenom,nom,adresse,dateNaissance,email,motdePasse,numTel) VALUES(:prenom,:nom,:adresse,:dateNaissance,:email,:motdePasse,:numTel)');

        //Bind values
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':dateNaissance', $data['daten']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':motdePasse', $data['mdp']);
        $this->db->bind(':numTel', $data['numtel']);
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function trouverUserEmail($email)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM utilisateurs WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }













}