<?php
class Evenements  extends Controller{

    public function __construct()
    {
        $this->evenementModel =$this->model('Evenement');
    }
    public function index(){

        $evenements = $this->evenementModel->findEvenement();


        $data=[
            'evenements' => $evenements,


        ];
         $this->view('evenements/evenements',$data);

    }




    public function details($id) {

        $evenements= $this->evenementModel->voir($id);


        $data=[
            'evenements'=>$evenements,




        ];

$this->view('evenements/details',$data);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function update($id){


    $evenement= $this->evenementModel->voir($id);




    $data=[
        'id'=> $id,
        'evenement' => $evenement,
        'libelle'=>'',
        'date'=>'',
        'adresse'=>'',
        'prix'=>'',
        'details'=>'',
        'place'=>'',
        'statut'=>'',
        'type' =>'',
        ///
        'libErreur'=>'',
        'dateErreur'=>'',
        'adresseErreur'=>'',
        'prixErreur'=>'',
        'detailsErreur'=>'',
        'statutErreur'=>'',
        'typeErreur'=>'',
        'placeErreur'=>'',
    ];
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        //
        $data=[
            'id'=> $id,
            'evenement' => $evenement,
         'libelle'=>trim($_POST['libelle']),
         'date'=>trim($_POST['date']),
         'adresse'=>trim($_POST['adresse']),
         'prix'=>trim($_POST['prix']),
         'details'=>trim($_POST['details']),
         'place'=>trim($_POST['place']),
         'statut'=>trim($_POST['statut']),
         'type' =>trim($_POST['type']),
         'libErreur'=>'',
         'dateErreur'=>'',
         'adresseErreur'=>'',
         'prixErreur'=>'',
         'placeErreur'=>'',
         'detailsErreur'=>'',
         'statutErreur'=>'',
         'typeErreur'=>'',
 ];
 if (empty($data['libelle'])) {
     $data['libErreur']='Saisissez un libelle';
 }
 //
 if (empty($data['date'])) {
     $data['dateErreur']='Saisissez une date';
 }
 //
 if (empty($data['adresse'])) {
     $data['adresseErreur']='Saisissez une adresse';
 }
 //
 if (empty($data['prix'])) {
     $data['prixErreur']='Saisissez un prix';
 }//
 if (empty($data['details'])) {
     $data['detailsErreur']='Saisissez les détails';
 }//
 if (empty($data['statut'])) {
     $data['statutErreur']='Saisissez un statut';
 }//
 if (empty($data['type'])) {
     $data['typeErreur']='Saisissez un type';
 }//
 if (empty($data['place'])) {
     $data['placeErreur']='Saisissez le nombre de place';
 }
//

//

 if (empty($data['libErreur'])&&empty($data['dateErreur'])&&empty($data['adresseErreur'])&&empty($data['prixErreur'])&&empty($data['detailsErreur'])&&empty($data['statutErreur'])&&empty($data['typeErreur'])&&empty($data['placeErreur'])) {
     if ($this->evenementModel->update($data)) {
         header('location:' . URLROOT . '/index');

     }else {
         die('probleme');
     }
 }else {
     $this->view('/evenements/update',$data);
 }
}
     $this->view('/evenements/update',$data);
 }

 /////////////////////////////////////////creer evenement///////////////////////////////////////:
 public function creerEvenement(){
    if (!estConnecteAdmin()) {
        header('location:' . URLROOT . '/admins/login');
    }

        $data=[

            'libelle'=>'',
            'date'=>'',
            'adresse'=>'',
            'prix'=>'',
            'details'=>'',
            'place'=>'',
            'statut'=>'',
            'type' =>'',
            ///
            'libErreur'=>'',
            'dateErreur'=>'',
            'adresseErreur'=>'',
            'prixErreur'=>'',
            'detailsErreur'=>'',
            'statutErreur'=>'',
            'typeErreur'=>'',
            'placeErreur'=>'',



    ];
    if ($_SERVER['REQUEST_METHOD']=='POST') {
       $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
       //
       $data=[
         'user_id'=>$_SESSION['user_id'],
        'libelle'=>trim($_POST['libelle']),
        'date'=>trim($_POST['date']),
        'adresse'=>trim($_POST['adresse']),
        'prix'=>trim($_POST['prix']),
        'details'=>trim($_POST['details']),
        'place'=>trim($_POST['place']),
        'statut'=>trim($_POST['statut']),
        'type' =>trim($_POST['type']),
        'libErreur'=>'',
        'dateErreur'=>'',
        'adresseErreur'=>'',
        'prixErreur'=>'',
        'placeErreur'=>'',
        'detailsErreur'=>'',
        'statutErreur'=>'',
        'typeErreur'=>'',
];
if (empty($data['libelle'])) {
    $data['libErreur']='Saisissez un libelle';
}
//
if (empty($data['date'])) {
    $data['dateErreur']='Saisissez une date';
}
//
if (empty($data['adresse'])) {
    $data['adresseErreur']='Saisissez une adresse';
}
//
if (empty($data['prix'])) {
    $data['prixErreur']='Saisissez un prix';
}//
if (empty($data['details'])) {
    $data['detailsErreur']='Saisissez les détails';
}//
if (empty($data['statut'])) {
    $data['statutErreur']='Saisissez un statut';
}//
if (empty($data['type'])) {
    $data['typeErreur']='Saisissez un type';
}//
if (empty($data['place'])) {
    $data['placeErreur']='Saisissez le nombre de place';
}

if (empty($data['libErreur'])&&empty($data['dateErreur'])&&empty($data['adresseErreur'])&&empty($data['prixErreur'])&&empty($data['detailsErreur'])&&empty($data['statutErreur'])&&empty($data['typeErreur'])&&empty($data['placeErreur'])) {
    if ($this->evenementModel->ajouterEv($data)) {
        header('location:' . URLROOT . '/evenements/evenements');

    }else {
        die('probleme');
    }
}else {
    $this->view('evenements/creerevenement',$data);
}
}
    $this->view('evenements/creerevenement',$data);
}

public function supprimer($id){
    $evenement= $this->evenementModel->voir($id);

        $data=[
            'libelle'=>'',
            'date'=>'',
            'adresse'=>'',
            'prix'=>'',
            'details'=>'',
            'place'=>'',
            'statut'=>'',
            'type' =>'',
            ///
            'libErreur'=>'',
            'dateErreur'=>'',
            'adresseErreur'=>'',
            'prixErreur'=>'',
            'detailsErreur'=>'',
            'statutErreur'=>'',
            'typeErreur'=>'',
            'placeErreur'=>'',



    ];
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        if ($this->evenementModel->sup($id)) {
            header('location:' . URLROOT . '/index');

        }
        else {
            die('probleme');
        }



    }

}



}