<?php

require_once (ROOT.'/components/DataBase.php');

class ArticleModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DataBase::getPDO();
    }

    /*
     * Getting Articles;
     * return obj;
     */
    public function getArticles()
    {
        $select = "SELECT users.name_user, article.id_article, article.article,  article.date, article.rating "
        ."FROM users INNER JOIN article ON users.id_user = article.id_user ORDER BY article.date DESC";
        $stmt = $this->pdo->prepare($select);
        $stmt->execute();

        return $stmt;
    }

    /*
     * Add new Articles;
     *
     */
    public function addArticle($data)
    {
            $author = $this->setAuthor($data['author']);

            $stmt = $this->pdo->prepare("SELECT id_user  FROM users WHERE name_user = :name_user");
            $stmt->bindValue(':name_user', $author);

            $stmt->execute();

            $id_user = $stmt->fetchColumn();
            $id_user = (int)$id_user;

            $date =  date("Y-m-d H:i:s");   //date("d.m.y");
            $stmt = $this->pdo->prepare("INSERT INTO article (id_user, article, date) 
            VALUES (:id_user, :article, :date)");
            $stmt->bindParam(':id_user',  $id_user);
            $stmt->bindParam(':article', $data['text']);
            $stmt->bindParam(':date', $date);

            $stmt->execute();
    }

    /*
     * Get Articles by $id;
     * return obj;
     */
    public function getArticle($id)
    {
        $stmt = $this->pdo->prepare("SELECT users.name_user, article.id_article, article.article,  article.date 
          FROM users INNER JOIN article ON users.id_user = article.id_user WHERE article.id_article = :id_article");

        $stmt->bindValue(':id_article',$id);
        $stmt->execute();

        return $stmt;
    }

    /*
     * Set Author;
     * return string;
     */
    private function setAuthor($author)
    {
        if($this->testAuthor($author)){
            return $author;
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO users (name_user) VALUES (:name_user)");
            $stmt->bindParam(':name_user', $author);

            $stmt->execute();

            return $author;
        }
    }

    /*
     * Checks Articles;
     * return string;
     */
    private function testAuthor($author)
    {
        $stmt = $this->pdo->prepare("SELECT name_user FROM users WHERE name_user = :name_user");
        $stmt->bindValue(':name_user',$author );

        $stmt->execute();
        $name = $stmt->fetchColumn();

        return $name;
    }

    /*
     * Add Comment;
     *
     */
    public function setComment($data, $id_article)
    {
       $author = $this->setAuthor($data['name']);

        $stmt = $this->pdo->prepare("SELECT id_user  FROM users WHERE name_user = :name_user");
        $stmt->bindValue(':name_user', $author);

        $stmt->execute();

        $id_user = $stmt->fetchColumn();
        $id_user = (int)$id_user;

        $stmt = $this->pdo->prepare("INSERT INTO comments (id_article, id_user, comment)
          VALUES (:id_article, :id_user, :comment)");
        $stmt->bindParam(':id_article',  $id_article);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':comment', $data['comment']);

        $stmt->execute();
        $this->setRating($id_article);
    }

    /*
     * Get Comment;
     * return obj;
     */
    public function getComment($id_article)
    {
        $stmt = $this->pdo->prepare("SELECT  users.name_user, comments.comment FROM comments 
            INNER JOIN users ON users.id_user = comments.id_user 
            WHERE comments.id_article = :id_article ORDER BY comments.id_comment ASC");

        $stmt->bindValue(':id_article', $id_article);
        $stmt->execute();

        return $stmt;
    }

    /*
     * Create Rating;
     *
     */
    private function setRating($id_article)
    {
        $stmt = $this->pdo->prepare("SELECT id_comment FROM comments WHERE id_article = :id_article");
        $stmt->bindValue(':id_article', $id_article);

        $stmt->execute();
        $count = $stmt->rowCount();
        $count = (int)$count;

        $stmt = $this->pdo->prepare("UPDATE article SET rating = :rating WHERE id_article = :id_article");
        $stmt->bindParam(':rating',  $count);
        $stmt->bindParam(':id_article',  $id_article);

        $stmt->execute();
    }

    /*
     * Get top 5 Article;
     * return obj;
     */
    public function getTopArticle()
    {
        $select = "SELECT users.name_user, article.id_article, article.article,  article.date, article.rating "
            ."FROM users INNER JOIN article ON users.id_user = article.id_user ORDER BY article.rating DESC LIMIT 5";
        $stmt = $this->pdo->prepare($select);
        $stmt->execute();

        return $stmt;
    }
}