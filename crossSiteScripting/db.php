<?php
class DB
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=hackingtest","root","");
    }

    public function insert($name, $email, $comment)
    {
        $stmt = $this->db->prepare("INSERT into comments (name, email, comment) VALUES (:name, :email, :comment)");
        $result = $stmt->execute([
            "name" => $name,
            "email" => $email,
            "comment" => $comment
        ]);
        return $result;
    }

    public function getComments()
    {
        $stmt = $this->db->prepare("SELECT * FROM comments");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
