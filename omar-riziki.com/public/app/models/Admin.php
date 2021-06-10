<?php
class Admin {

    private $db;
    public function __construct()
    {
        $this->db= new Database;
    }

    public function findAdminByEmail($email){
        $this->db->query('SELECT * from users where email=:email');
        $this->db->bind(':email',$email);

        if ($this->db->rowCount()>0) {
           return true;
        }else {
            return false;
        }

    }




public function register($data)
{
    $this->db->query('INSERT INTO users (username,email,password) values(:username,:email,:password)');
    $this->db->bind(':username',$data['username']);
    $this->db->bind(':email',$data['email']);
    $this->db->bind(':password',$data['password']);

    if ($this->db->execute()) {
        return true;}else {
            return false;
        }

    }

    public function login($username,$password){
        $this->db->query('SELECT * from users where username=:username');
        $this->db->bind(':username',$username);
      $row=  $this->db->single();

      $hashedPassword=$row->password;

      if (password_verify($password,$hashedPassword)) {
         return $row;
      }else {
          return false;
      }

    }





    public function voir($id)
    {

        $this->db->query('SELECT * from evenements where idev=:idev');
        $this->db->bind(':idev', $id);
        $row = $this->db->single();
        return $row;
    }


}


