<?php 
class Enfant 
{
    private $db;

    public function __construct()
    {
        $this->db =new Database;
    }

    public function info($id)
    {

        $this->db->query('SELECT * from enfants where ide=:ide');
        $this->db->bind(':ide', $id);
        $row = $this->db->single();
        return $row;
    }
}
