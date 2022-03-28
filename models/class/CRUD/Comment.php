<?php


/*classe commentaire reflettant la table Comment */

/**
 * stmt : statement(requête préparées)
 *  $this->pdo : interface PDO
 */
namespace App\CRUD;
use PDO;

class Comment
{

    private $CommentID;
    private $CommentArticle;
    private $CommentUser;
    private $CommentText;
    private $CommentDate;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getCommentID(){return $this->CommentID;}
    public function setCommentID($CommentID){$this->CommentID = $CommentID;}

    public function getCommentArticle(){return $this->CommentArticle;}
    public function setCommentArticle($CommentArticle){$this->CommentArticle = $CommentArticle;}

    public function getCommentUser(){return $this->CommentUser;}
    public function setCommentUser($CommentUser){$this->CommentUser = $CommentUser;}

    public function getCommentText(){return $this->CommentText;}
    public function setCommentText($CommentText){$this->CommentText = $CommentText;}

    public function getCommentDate(){return $this->CommentDate;}
    public function setCommentDate($CommentDate){$this->CommentDate = $CommentDate;}

    // Créer un commentaire
    public function createComment(int $CommentArticle, int $CommentUser, string $CommentText)
    {

        $sql = "INSERT INTO Comment(
        CommentArticle,
        CommentUser,
        CommentText
        )
        VALUES(
        :CommentArticle,
        :CommentUser,
        :CommentText
        )";

        $stmt = $this->pdo->prepare($sql);
          
        $stmt->bindParam(':CommentArticle', $this->CommentArticle);
        $stmt->bindParam(':CommentUser', $this->CommentUser);
        $stmt->bindParam(':CommentText', $this->CommentText);

        $this->setCommentArticle($CommentArticle);
        $this->setCommentUser($CommentUser);
        $this->setCommentText($CommentText);

        $stmt->execute();

    }

    // Trouver un(des) commentaire(s) sur un article
    public function retrieveComment(int $ArticleID)
    {
        $sql = "SELECT 
        CommentID,
        CommentText,
        CommentDate,  
        UserName,
        UserProfile
        FROM Article
        INNER JOIN(User
        INNER JOIN Comment
        ON User.UserID = Comment.CommentUser)
        ON Article.ArticleID = Comment.CommentArticle
        WHERE
        ArticleID = :ArticleID
        ORDER BY CommentDate DESC
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':ArticleID', $ArticleID);

        $stmt->execute();

        return $stmt->fetchAll();
        
    }

    // Modifier un commentaire
    public function updateComment(int $CommentID, string $CommentArticle, string $CommentUser, string $CommentText)
    {
        $sql = "UPDATE Comment
        SET
        CommentArticle = :CommentArticle,
        CommentUser = :CommentUser,
        CommentText = :CommentText,
        WHERE CommentID = :CommentID
        ";

        $stmt = $this->pdo->prepare($sql);
          
        $stmt->bindParam(':CommentArticle', $this->CommentArticle);
        $stmt->bindParam(':CommentUser', $this->CommentUser);
        $stmt->bindParam(':CommentText', $this->CommentText);
        $stmt->bindParam(':CommentID', $this->CommentID);

        $this->setCommentArticle($CommentArticle);
        $this->setCommentUser($CommentUser);
        $this->setCommentText($CommentText);
        $this->setCommentID($CommentID);

        $stmt->execute();
       
    }

    // Supprimer un commentaire avec le commenteur
    public function deleteComment(int $CommentID)
    {
        $sql = "DELETE FROM Comment
        WHERE CommentID = :CommentID
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':CommentID', $CommentID);

        $stmt->execute();

        
    }

    //Compter le nombre de commentaire par article
    public function countComment(int $ArticleID)
    {
        $sql = "SELECT COUNT(CommentID)
        FROM Article
        INNER JOIN Comment
        ON Article.ArticleID = Comment.CommentArticle
        WHERE ArticleID = :ArticleID
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':ArticleID',$ArticleID);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_NUM)[0];

    }

    //Obtenir un seul commentaire

    public function getLastComment()
    {
        $sql = "SELECT 
        CommentID,
        CommentText,
        CommentDate,  
        UserName,
        UserProfile
        FROM Article
        INNER JOIN(User
        INNER JOIN Comment
        ON User.UserID = Comment.CommentUser)
        ON Article.ArticleID = Comment.CommentArticle
        WHERE CommentDate = NOW()
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetch();


    }
}
