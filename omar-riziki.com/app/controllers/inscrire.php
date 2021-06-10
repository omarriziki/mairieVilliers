<?php

class inscrire extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        $this->enfantrModel = $this->model('Enfant');


        $errors = array();
        $values = array();


        $values['eid'] = $_POST['inscrire'];
        $d = 8;
        $eid = substr($values['eid'], $d);


        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            try {
                $this->db->query("select * from `inscription_ecole` where `id_enfant`='" . $_GET['id_en']. "' &&
							  `id_ecole`='" . $eid . "'");

                $this->db->execute();
                if ($this->db->rowCount() > 0) {
                    $errors['eventregistered'] = "Already Registered";
                } else {
                }
            } catch (PDOException $e) {
                echo "<br>" . $e->getMessage();
                die();
            }
        }

        if (count($errors) == 0) {
            try {

                $this->db->query("INSERT INTO `inscription_cantine`(`id_enfant`, `id_ecole`) VALUES ('" .  $_GET['id_en']. "','" . $eid . "')");


                $this->db->execute();
            } catch (PDOException $e) {
                echo "<br>" . $e->getMessage();
                die();
            }
        }


}


    public function index(){

        $utilisateurs = $this->utilisateurModel->findUsers();


        $data = [
            'utilisateurs' => $utilisateurs,


        ];

        $this->view('utilisateurs/profile', $data);




    }


}
