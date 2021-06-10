<?php
class Conexion_m
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function conexion($email, $password)
    {
        $this->db->query('SELECT * FROM utilisateurs WHERE email = :email');

        //Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashedPassword = $row->motdePasse;

        $passwordCheck = password_verify($password, $hashedPassword);
        if (!$passwordCheck) {
            return false;
        } else {
            return $row;
        }
    }


}