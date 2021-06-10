<?php

class participer extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        $this->utilisateurModel = $this->model('Utilisateur');


        $errors = array();
        $values = array();


        $values['eid'] = $_POST['register'];
        $d = 8;
        $eid = substr($values['eid'], $d);


        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            try {
                $this->db->query("select * from `inscrit` where `id_utilisateur`='" . $_SESSION['id_u'] . "' &&
							  `id_evenement`='" . $eid . "'");

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

                $this->db->query("INSERT INTO `inscrit`(`id_utilisateur`, `id_evenement`) VALUES ('" . $_SESSION['id_u'] . "','" . $eid . "')");


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
