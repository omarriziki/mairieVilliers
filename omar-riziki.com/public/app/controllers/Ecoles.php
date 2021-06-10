<?php
class Ecoles  extends Controller
{

    public function __construct()
    {
        $this->ecoleModel = $this->model('Ecole');
    }
    public function index()
    {

        $ecoles = $this->ecoleModel->findEcole();


        $data = [
            'ecoles' => $ecoles,


        ];
        $this->view('ecoles/index', $data);
    }


    public function informations($id)
    {

        $ecoles = $this->ecoleModel->trouverEcole($id);


        $data = [
            'ecoles' => $ecoles,




        ];

        $this->view('ecoles/informations', $data);
    }

    ////////////////////////////////////////
    public function ajouterecole()
    {
        if (!estConnecteAdmin()) {
            header('location:' . URLROOT . '/admins/login');
        }
        $data = [
            'nom' => '',

            'adresse' => '',
            'numtel' => '',
            'nombreEl' => '',
            'email' => '',
            'nomDir' => '',

            ///
            'nomErreur' => '',
            'adresseErreur' => '',
            'numtelErreur' => '',
            'nombreErreur' => '',
            'emailErreur' => '',
            'nomdirErreur' => '',



        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //
            $data = [

                'nom' => trim($_POST['nom']),
                'adresse' => trim($_POST['adresse']),
                'numtel' => trim($_POST['numtel']),
                'nombreEl' => trim($_POST['nombreEl']),
                'email' => trim($_POST['email']),
                'nomDir' => trim($_POST['nomDir']),
                'nomErreur' => '',
                'adresseErreur' => '',
                'numtelErreur' => '',
                'nombreErreur' => '',
                'emailErreur' => '',
                'nomdirErreur' => '',
            ];
            if (empty($data['nom'])) {
                $data['nomErreur'] = 'Saisissez un nom';
            }
            //
            //
            if (empty($data['adresse'])) {
                $data['adresseErreur'] = 'Saisissez une adresse';
            }
            //
            if (empty($data['numtel'])) {
                $data['numTelErreur'] = 'Saisissez le numéro de télephone';
            } //
            if (empty($data['nombreEl'])) {
                $data['nombreErreur'] = 'Saisissez le nombre d\'èlèves';
            } //
            if (empty($data['email'])) {
                $data['emailErreur'] = 'Saisissez un email';
            } //
            if (empty($data['nomDir'])) {
                $data['nomdirErreur'] = 'Saisissez le nom du directeur';
            } //


            if (empty($data['nomErreur']) && empty($data['adresseErreur']) && empty($data['numtelErreur']) && empty($data['nombreErreur']) && empty($data['emailErreur']) && empty($data['nomdirErreur'])) {
                if ($this->ecoleModel->ajouterEc($data)) {
                    header('location:' . URLROOT . '/ecoles/index');
                } else {
                    die('probleme');
                }
            } else {
                $this->view('ecoles/ajouterecole', $data);
            }
        }
        $this->view('ecoles/ajouterecole', $data);
    }


    public function maj($id)
    {


        $ecole = $this->ecoleModel->trouverEcole($id);




        $data = [
            'id' => $id,
            'ecole' => $ecole,
            'nom' => '',
            'adresse' => '',
            'numtel' => '',
            'nombreEl' => '',
            'email' => '',
            'nomDir' => '',
            ///
            'nomErreur' => '',
                'adresseErreur' => '',
                'numtelErreur' => '',
                'nombreErreur' => '',
                'emailErreur' => '',
                'nomdirErreur' => '',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //
            $data = [
                'id'=> $id,
                'nom' => trim($_POST['nom']),
                'adresse' => trim($_POST['adresse']),
                'numtel' => trim($_POST['numtel']),
                'nombreEl' => trim($_POST['nombreEl']),
                'email' => trim($_POST['email']),
                'nomDir' => trim($_POST['nomDir']),
                'nomErreur' => '',
                'adresseErreur' => '',
                'numtelErreur' => '',
                'nombreErreur' => '',
                'emailErreur' => '',
                'nomdirErreur' => '',
            ];
            if (empty($data['nom'])) {
                $data['nomErreur'] = 'Saisissez un nom';
            }
            //
            //
            if (empty($data['adresse'])) {
                $data['adresseErreur'] = 'Saisissez une adresse';
            }
            //
            if (empty($data['numtel'])) {
                $data['numTelErreur'] = 'Saisissez le numéro de télephone';
            } //
            if (empty($data['nombreEl'])) {
                $data['nombreErreur'] = 'Saisissez le nombre d\'èlèves';
            } //
            if (empty($data['email'])) {
                $data['emailErreur'] = 'Saisissez un email';
            } //
            if (empty($data['nomDir'])) {
                $data['nomdirErreur'] = 'Saisissez le nom du directeur';
            } //

            //

            //

            if (empty($data['nomErreur']) && empty($data['adresseErreur']) && empty($data['numtelErreur']) && empty($data['nombreErreur']) && empty($data['emailErreur']) && empty($data['nomdirErreur'])) {
                if ($this->ecoleModel->majecole($data)) {
                    header('location:' . URLROOT . '/index');
                } else {
                    die('probleme');
                }
            } else {
                $this->view('/ecoles/maj', $data);
            }
        }
        $this->view('/ecoles/maj', $data);
    }

    public function supprimer($id){
        $ecole= $this->ecoleModel->trouverEcole($id);

        $data = [
            'nom' => '',

            'adresse' => '',
            'numtel' => '',
            'nombreEl' => '',
            'email' => '',
            'nomDir' => '',
            ///
            'nomErreur' => '',
            'adresseErreur' => '',
            'numtelErreur' => '',
            'nombreErreur' => '',
            'emailErreur' => '',
            'nomdirErreur' => '',
        ];
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            if ($this->ecoleModel->sup($id)) {
                header('location:' . URLROOT . '/index');

            }
            else {
                die('probleme');
            }



        }
    }
}
