<?php 
class Admins extends Controller {

    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        $this->utilisateurModel = $this->model('Utilisateur');
        $this->ecoleModel = $this->model('Ecole');
        $this->evenementModel = $this->model('Evenement');


    }

    public function register(){
        $data=[
            'username'=>'',
            'email'=>'',
            'password'=>'',
            'confirmPassword'=>'',
            'usernameErreur'=>'',
            'emailErreur'=>'',
            'passwordErreur'=>'',
            'confirmPasswordErreur'=>'',
        ];
        //////////////////////////////

        if ($_SERVER['REQUEST_METHOD']=='POST') {
           ///Securiser input
           $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
           $data=[
            'username'=>trim($_POST['username']),
            'email'=>trim($_POST['email']),
            'password'=>trim($_POST['password']),
            'confirmPassword'=>trim($_POST['confirmPassword']),
            'usernameErreur'=>'',
            'emailErreur'=>'',
            'passwordErreur'=>'',
            'confirmPasswordErreur'=>'',
        ];

         $nameValidation = "/^[a-zA-Z0-9]*$/";
         $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
         if (empty($data['username'])) {
            $data['usernameErreur'] = 'Veuillez saisir votre login';
         }elseif (!preg_match($nameValidation,$data['username'])) {
            $data['usernameErreur'] = 'login peut uniquement contenir des letrre et chiffres';
         }
         //////////////////
         if (empty($data['email'])) {
            $data['emailErreur'] = 'Veuillez saisir un Email';
        }elseif (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) {
            $data['emailErreur'] = 'format correct';
        }else {
            if ($this->adminModel->findAdminByEmail($data['email'])) {
            $data['emailErreur'] = 'email existant dans la bdd';

            }
        }
        /////////////////
        if (empty($data['password'])) {
            $data['passwordErreur'] = 'Veuillez saisir un mot de passe';
        }elseif (strlen($data['password']<6)) {
            $data['passwordErreur'] = 'minimmum 6 caractères';
        }elseif (!preg_match($passwordValidation,$data['password'])) {
            $data['passwordErreur'] = 'minimum 1 chiffre';
         }
         ///////////
         if (empty($data['confirmPassword'])) {
            $data['confirmPasswordErreur'] = 'Veuillez saisir un mot de passe';
        }
        else {
            if ($data['password']!=$data['confirmPassword']) {
                $data['ConfirmPasswordErreur'] = 'les mots de passe ne correspendent pas';
            }
        }
        //////////////////
        if (empty($data['usernameErreur'])&&empty($data['emailErreur'])&&empty($data['emailErreur']) &&empty($data['confirmPasswordErreur'])) {
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
            if ($this->adminModel->register($data)) {
                header('location: ' .URLROOT .'/admins/login');
            }else {
                die('probleme');
            }
        }

    }

        $this->view('admins/register',$data);
    }
    

    public function login(){
        if (estConnecteAdmin() || estConnecte() ) {
            header('location:' . URLROOT . '/v/conexion');}
        $data=[
            'titre'=>'Login',
            'username'=>'',
            'password'=>'',
            'usernameErreur'=>'',
            'passwordErreur'=>''

        ];

        /////
        if ($_SERVER['REQUEST_METHOD']=='POST') {
           $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data=[
                'username'=> trim($_POST['username']),
                'password'=> trim($_POST['password']),
                'usernameErreur'=> '',
                'passwordErreur'=> '',

            ];
            if (empty($data['username'])) {
               $data['usernameErreur']= 'veuillez saisir votre login';
            }
            if (empty($data['password'])) {
                $data['passwordErreur']= 'veuillez saisir votre mdp';
             }
             if (empty($data['usernameErreur'])&&empty($data['usernameErreur'])) {
                 $loggedInAdmin = $this->adminModel->login($data['username'],$data['password']);
                 if ($loggedInAdmin) {
                    $this->adminSession($loggedInAdmin);
                 }else {
                     $data['passwordErreur']==' Incorrecte';
                     $this->view('admins/login',$data);
                 }
             }
        }else {
            $data=[

                'username'=>'',
                'password'=>'',
                'usernameErreur'=>'',
                'passwordErreur'=>''

            ];
        }

        $this->view('admins/login',$data);
    }
    public function adminSession($user){
        $_SESSION['user_id']= $user->id ;
        $_SESSION['email']= $user->email;
        $_SESSION['username']= $user->username;

        header('location:' . URLROOT . '/admins/index');

    }
    public function deconexion(){
        session_destroy();
        header('location:' . URLROOT . '/admins/login');
    }


    public function index(){

        $evenement= $this->evenementModel->cpt();
        $utilisateur= $this->utilisateurModel->cpt();
        $ecole= $this->ecoleModel->cpt();

        $data=[
            'evenements'=>$evenement,
            'utilisateurs'=>$utilisateur,
            'ecoles'=>$ecole

        ];

        $this->view('/admins/index',$data);

    }









}