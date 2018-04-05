<?php

require_once (ROOT.'/components/DataBase.php');

class ArticleModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DataBase::getPDO();
    }

    public function getArticles()
    {
        $select = "SELECT users.name_user, article.id_article, article.article,  article.date "
        ."FROM users INNER JOIN article ON users.id_user = article.id_user ORDER BY article.date DESC";
        $stmt = $this->pdo->prepare($select);
        $stmt->execute();

//        foreach ($stmt as $row)
//        {
//            echo "{$row['name_user']}" . "</br>";
//            echo "{$row['id_article']}" . "</br>";
//            echo "{$row['article']}" . "</br>";
//            echo "{$row['date']}" . "</br>";
//        }
//        exit;
        return $stmt;
    }

    public function insertArticle($data)
    {
            $date =  date("Y-m-d");   //date("d.m.y");

            $stmt = $this->pdo->prepare("INSERT INTO users (name_user) VALUES (:name_user)");
            $stmt->bindParam(':name_user', $data['author']);

            $stmt->execute();

            $stmt = $this->pdo->prepare("SELECT id_user  FROM users WHERE name_user = :name_user");
            $stmt->bindValue(':name_user',$data['author']);

            $stmt->execute();

            $id_user = $stmt->fetchColumn();
            $id_user = (int)$id_user;

            $stmt = $this->pdo->prepare("INSERT INTO article (id_user, article, date) VALUES (:id_user, :article, :date)");
            $stmt->bindParam(':id_user',  $id_user);
            $stmt->bindParam(':article', $data['text']);
            $stmt->bindParam(':date', $date);

            $stmt->execute();
    }

    public function getArticle($id)
    {
//        $select = "SELECT users.name_user, article.id_article, article.article,  article.date "
//            ."FROM users INNER JOIN article ON users.id_user = article.id_user WHERE users.id_users = 1";
//        SELECT users.name_user, article.id_article, article.article,  article.date FROM users INNER JOIN article
//        ON users.id_user = article.id_user WHERE article.id_article = 2

        $stmt = $this->pdo->prepare("SELECT users.name_user, article.id_article, article.article,  article.date 
          FROM users INNER JOIN article ON users.id_user = article.id_user WHERE article.id_article = :id_article");

        $stmt->bindValue(':id_article',$id);
        $stmt->execute();

        return $stmt;
    }

    private function setAuthor($author)
    {
        $stmt = $this->pdo->prepare("SELECT name_user FROM users WHERE name_user = :name_user");
        $stmt->bindValue(':name_user',$author );

        $stmt->execute();
        return $stmt;
    }
}