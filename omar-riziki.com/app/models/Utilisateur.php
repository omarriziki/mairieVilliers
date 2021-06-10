<?php
class Utilisateur
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
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



    public function findUsers()
    {
        $this->db->query("SELECT distinct * FROM utilisateurs");

        $result = $this->db->resultSet();

        return $result;
    }



    public function modifier($data)
    {

        $id = $_SESSION['id_u'];
        $this->db->query("UPDATE utilisateurs set prenom = :prenom ,nom = :nom,adresse=:adresse,dateNaissance=:dateNaissance,email=:email,motdepasse=:motdePasse,numTel=:numTel where '$id' =idU ");

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
    /////////////////////////////////////////////////////////////INSCRIPTION EVENEMENTS////////////////////////////////////////////////////

public function af(){
  $this->db->query("SELECT evenements.libelle as lib,inscrit.*
    from inscrit join evenements on evenements.idev=inscrit.id_evenement where inscrit.id_utilisateur='" . $_SESSION['id_u'] . "'");
    $result = $this->db->resultSet();

    return $result;
}

public function info($id)
{

    $this->db->query('SELECT * from utilisateurs where idU=:idU');
    $this->db->bind(':idU', $id);
    $row = $this->db->single();
    return $row;
}

public function cpt (){

    $this->db->query("SELECT * from utilisateurs");
    $result = $this->db->rowCount();

    return $result;
}

}
