<?php

require_once (ROOT.'/components/DataBase.php');

class ArticleModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DataBase::getPDO();
    }

    public function viewDataBase()
    {
        print_r($this->pdo);
    }

    public function insertValues($data)
    {

        $stmt = $this->pdo->prepare("INSERT INTO blog (author, text, date) VALUES (:author, :text, :date)");
        $stmt->bindParam(':author', $data['author']);
        $stmt->bindParam(':text', $data['text']);
        $stmt->bindParam(':date', $data['date']);
        $stmt->execute();
        return 1;
    }
}