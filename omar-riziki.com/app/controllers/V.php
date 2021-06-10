<?php
class V extends Controller
{

    public function __construct()
    {
        $this->inscriptionModel = $this->model('Inscription_m');
        $this->conexionModel = $this->model('Conexion_m');

      

    }
    public function index()
    {
        $data = [];
        $this->view('V', $data);
    }
    ////////////////////////////////////////////Creation de session

/////////////////////////////////////:Conexion
    public function conexion()
    {
        if ( estConnecte() ) {
            header('location: ' . URLROOT . '/utilisateurs/profile');
        }
        $data = [

            'email' => '',
            'mdp' => '',
            'emailErreur' => '',
            'mdpErreur' => ''
        ];

        //Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'mdp' => trim($_POST['mdp']),
                'emailErreur' => '',
                'mdpErreur' => ''
            ];
            //Validate username
            if (empty($data['email'])) {
                $data['emailErreur'] = 'email svp.';
            }

            //Validate password
            if (empty($data['mdp'])) {
                $data['mdpErreur'] = 'mdp svp.';
            }

            //Check if all errors are empty
            if (empty($data['emailErreur']) && empty($data['mdpErreur'])) {
                $estConnecte = $this->conexionModel->conexion($data['email'], $data['mdp']);

                if ($estConnecte) {
                    $this->creerSession($estConnecte);
                } else {
                    $data['mdpErreur'] = 'Email ou Mot de passe incorrect.';

                    $this->view('V/conexion', $data);
                }
            }
        } else {
            $data = [
                'emailErreur' => '',
                'mdpErreur' => ''

            ];
        }
        $this->view('V/conexion', $data);
    }
    public function creerSession($utilisateur)
    {
        $_SESSION['id_u'] = $utilisateur->idU;
        $_SESSION['email'] = $utilisateur->email;
        $_SESSION['prenom'] = $utilisateur->prenom;
        $_SESSION['nom'] = $utilisateur->nom;
        $_SESSION['adresse'] = $utilisateur->adresse;
        $_SESSION['dateNaissance'] = $utilisateur->dateNaissance;
        $_SESSION['numtel'] = $utilisateur->numTel;

        echo 'sdf' ;
        header('location:' . URLROOT . '/pages/index');
    }

    public function deconexion()
    {
        session_destroy();

        header('location:' . URLROOT . '/V/conexion');
    }

    ///////////////////////////////////////////////////////////////////////////////Inscription/////////////////////////////
    public function inscription()
    {
        $data = [
            'prenom' => '',
            'nom' => '',
            'adresse' => '',
            'daten' => '',
            'email' => '',
            'mdp' => '',
            'numtel' => '',
            'mdprepet' => '',


            //erreur input

            'prenomErreur' => '',
            'nomErreur' => '',
            'adresseErreur' => '',
            'datenErreur' => '',
            'emailErreur' => '',
            'mdpErreur' => '',
            'numtelErreur' => '',
            'mdprepetErreur' => '',

        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'prenom' => trim($_POST['prenom']),
                'nom' => trim($_POST['nom']),
                'adresse' => trim($_POST['adresse']),
                'daten' => trim($_POST['daten']),
                'email' => trim($_POST['email']),
                'mdp' => trim($_POST['mdp']),
                'numtel' => trim($_POST['numtel']),
                'mdprepet' => trim($_POST['mdprepet']),

                // gestion des erreurs
                'prenomErreur' => '',
                'nomErreur' => '',
                'adresseErreur' => '',
                'datenErreur' => '',
                'emailErreur' => '',
                'mdpErreur' => '',
                'numtelErreur' => '',
                'mdprepetErreur' => '',

                // fin de gestion des erreurs
            ];

            $nameValidation = "/^[a-zA-Z]*$/";

            $telValidation = "/^[0-9]*$/";


            //Valider prenom
            if (empty($data['prenom'])) {
                $data['prenomErreur'] = 'Veuillez saisir votre prénom.';
            } elseif (!preg_match($nameValidation, $data['prenom'])) {
                $data['prenom'] = 'Alphabet seulement.';
            }
            //Valider nom
            if (empty($data['nom'])) {
                $data['nomErreur'] = 'Veuillez saisir votre nom.';
            } elseif (!preg_match($nameValidation, $data['nom'])) {
                $data['nomErreur'] = 'Alphabet seulement.';
            }
            //Valider adresse
            if (empty($data['adresse'])) {
                $data['adresseErreur'] = 'Veuillez saisir votre adresse.';
            }
            //Valider date naissance
            if (empty($data['daten'])) {
                $data['datenErreur'] = 'Veuillez saisir votre date de naissance.';
            }

            //valider num tel
            if (empty($data['numtel'])) {
                $data['numtelErreur'] = 'Veuillez saisir votre numéro.';
            } elseif (!preg_match($telValidation, $data['numtel'])) {
                $data['numtelErreur'] = 'tel valide .';
            }


            //Validate email
            if (empty($data['email'])) {
                $data['emailErreur'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailErreur'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->inscriptionModel->trouverUserEmail($data['email'])) {
                    $data['emailErreur'] = 'Cet email existe déja.';
                }
            }

            // Validate password on length, numeric values,
            if (empty($data['mdp'])) {
                $data['mdpErreur'] = 'veuillez saisir votre mot de passe.';
            } elseif (strlen($data['mdp']) < 6) {
                $data['mdpErreur'] = 'Votre mot de passe doit contenir minimum 8 caractères';
            }

            //Validate confirm password
            if (empty($data['mdprepet'])) {
                $data['mdprepetErreur'] = 'Veuillez saisir votre mot de passe.';
            } else {
                if ($data['mdp'] != $data['mdprepet']) {
                    $data['mdprepetErreur'] = 'Les mots de passe ne correspendent pas.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['prenomErreur']) && empty($data['nomErreur']) && empty($data['adresseErreur']) && empty($data['datenErreur']) && empty($data['emailErreur']) && empty($data['mdpErreur']) && empty($data['numtelErreur']) && empty($data['mdprepetErreur'])) {

                // Hash password
                $data['mdp'] = password_hash($data['mdp'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->inscriptionModel->inscription($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/v/conexion');
                } else {
                    die('problème.');
                }
            }
        }
        $this->view('v/inscription', $data);
    }













}