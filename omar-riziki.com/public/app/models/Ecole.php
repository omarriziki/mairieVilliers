<?php
    class Ecole {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function findEcole() {
            $this->db->query("SELECT distinct * FROM ecoles");

            $result = $this->db->resultSet();

            return $result;

        }




    public function ajouterEc($data){
        $this->db->query('INSERT into ecoles (nom,numtel,adresse,email,nombreEleve,nomDirecteur)
        values(:nom,:numtel,:adresse,:email,:nombreEleve,:nomDirecteur)');

        $this->db->bind(':nom',$data['nom']);
        $this->db->bind(':numtel',$data['numtel']);
        $this->db->bind(':adresse',$data['adresse']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':nombreEleve',$data['nombreEl']);
        $this->db->bind(':nomDirecteur',$data['nomDir']);


        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }

    }

    public function majecole($data){
        $this->db->query('UPDATE ecoles set nom=:nom,numtel=:numtel,adresse=:adresse,email=:email,nombreEleve=:nombreEleve,nomDirecteur=:nomDirecteur where idec=:idec');
              $this->db->bind(':idec',$data['id']);
              $this->db->bind(':nom',$data['nom']);
              $this->db->bind(':numtel',$data['numtel']);
              $this->db->bind(':adresse',$data['adresse']);
              $this->db->bind(':email',$data['email']);
              $this->db->bind(':nombreEleve',$data['nombreEl']);
              $this->db->bind(':nomDirecteur',$data['nomDir']);

              if ($this->db->execute()) {
                  return true;
              }else {
                  return false;
              }
          }

          public function trouverEcole($id)
          {

              $this->db->query('SELECT * from ecoles where idec=:idec');
              $this->db->bind(':idec', $id);
              $row = $this->db->single();
              return $row;
          }



          public function cpt (){

            $this->db->query("SELECT * from ecoles");
            $result = $this->db->rowCount();

            return $result;
        }

         public function sup($id){
            $this->db->query('DELETE from ecoles  where idec=:idec');
            $this->db->bind(':idec',$id);
            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }
        }




    }