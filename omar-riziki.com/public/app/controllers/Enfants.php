<?php
class Enfants  extends Controller{

    public function __construct()
    {
        $this->enfantModel =$this->model('Enfant');
    }


    public function informations($id) {

        $enfant= $this->enfantModel->info($id);


        $data=[
            'enfant'=>$enfant,




        ];
   
    }
 }