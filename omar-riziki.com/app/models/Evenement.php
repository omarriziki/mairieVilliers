<?php
class Evenement
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        $errors = array();
        $values = array();
    }

    public function findEvenement()
    {
        $this->db->query("SELECT  * FROM evenements ORDER BY date ");

        $result = $this->db->resultSet();

        return $result;
    }



    public function voir($id)
    {

        $this->db->query('SELECT * from evenements where idev=:idev');
        $this->db->bind(':idev', $id);
        $row = $this->db->single();
        return $row;
    }


    ///
    public function update($data){
        $this->db->query('UPDATE evenements set libelle=:libelle,date=:date,adresse=:adresse,place=:place,prix=:prix,details=:details,type=:type ,statut=:statut where idev=:idev');
              $this->db->bind(':idev',$data['id']);
              $this->db->bind(':libelle',$data['libelle']);
              $this->db->bind(':date',$data['date']);
              $this->db->bind(':adresse',$data['adresse']);
              $this->db->bind(':place',$data['place']);
              $this->db->bind(':prix',$data['prix']);
              $this->db->bind(':details',$data['details']);
              $this->db->bind(':type',$data['type']);
              $this->db->bind(':statut',$data['statut']);

              if ($this->db->execute()) {
                  return true;
              }else {
                  return false;
              }
          }


          public function ajouterEv($data){
            $this->db->query('INSERT into evenements (libelle,date,adresse,place,prix,details,type,statut)
            values(:libelle,:date,:adresse,:place,:prix,:details,:type,:statut)');

            $this->db->bind(':libelle',$data['libelle']);
            $this->db->bind(':date',$data['date']);
            $this->db->bind(':adresse',$data['adresse']);
            $this->db->bind(':place',$data['place']);
            $this->db->bind(':prix',$data['prix']);
            $this->db->bind(':details',$data['details']);
            $this->db->bind(':type',$data['type']);
            $this->db->bind(':statut',$data['statut']);

            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }

        }

        public function sup($id){
            $this->db->query('DELETE from evenements  where idev=:idev');
            $this->db->bind(':idev',$id);
            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }


        }

        public function cpt (){

            $this->db->query("SELECT * from evenements");
            $result = $this->db->rowCount();

            return $result;
        }



}
