<?php


/*classe article reflettant la table Article */

/**
 * stmt : statement(requête préparées)
 *  $this->pdo : interface PDO
*/
namespace App\CRUD;
use PDO;

class Article
{

    private $ArticleID;
    private $ArticleName;
    private $ArticleCategorie;
    private $ArticleDate;
    private $ArticleImage;
    private $ArticleDescription;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getArticleID(){return $this->ArticleID;}
    public function setArticleID($ArticleID){$this->ArticleID = $ArticleID;}

    public function getArticleName(){return $this->ArticleName;}
    public function setArticleName($ArticleName){$this->ArticleName = $ArticleName;}
    
    public function getArticleCategorie(){return $this->ArticleCategorie;}
    public function setArticleCategorie($ArticleCategorie){$this->ArticleCategorie = $ArticleCategorie;}
    
    
    public function getArticleDate(){return $this->ArticleDate;}
    public function setArticleDate($ArticleDate){$this->ArticleDate = $ArticleDate;}
    
    public function getArticleImage(){return $this->ArticleImage;}
    public function setArticleImage($ArticleImage){$this->ArticleImage = $ArticleImage;}

    public function getArticleDescription(){return $this->ArticleDescription;}
    public function setArticleDescription($ArticleDescription){$this->ArticleDescription = $ArticleDescription;}



    // Créer un article
    public function createArticle(string $ArticleName, string $ArticleCategorie, string $ArticleImage, string $ArticleDescription)
    {

        $sql = "INSERT INTO Article(
        ArticleName,
        ArticleCategorie,
        ArticleImage,
        ArticleDescription
        )
        VALUES(
        :ArticleName,
        :ArticleCategorie,
        :ArticleImage,
        :ArticleDescription
        )";

        $stmt = $this->pdo->prepare($sql);
          
        $stmt->bindParam(':ArticleName', $this->ArticleName);
        $stmt->bindParam(':ArticleCategorie', $this->ArticleCategorie);
        $stmt->bindParam(':ArticleImage', $this->ArticleImage);
        $stmt->bindParam(':ArticleDescription', $this->ArticleDescription);

        $this->setArticleName($ArticleName);
        $this->setArticleCategorie($ArticleCategorie);
        $this->setArticleImage($ArticleImage);
        $this->setArticleDescription($ArticleDescription);

        $stmt->execute();

    }

    // Trouver un(des) article(s)
    public function retrieveArticle(string $ArticleName, string $ArticleCategorie)
    {
        $sql = "SELECT *
        FROM Article
        WHERE
        ArticleCategorie = :ArticleCategorie AND
        ArticleName = :ArticleName OR
        ArticleName LIKE CONCAT('%', :ArticleName) OR
        ArticleName LIKE CONCAT(:ArticleName, '%') OR
        ArticleName LIKE CONCAT('%', :ArticleName, '%')
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':ArticleName', $ArticleName);
        $stmt->bindParam(':ArticleCategorie', $ArticleCategorie);

        $stmt->execute();

        return $stmt->fetchAll();
        
    }

    // Modifier un article
    public function updateArticle(int $ArticleID, string $ArticleName, string $ArticleCategorie, string $ArticleImage, string $ArticleDescription)
    {
        $sql = "UPDATE Article
        SET
        ArticleName = :ArticleName,
        ArticleCategorie = :ArticleCategorie,
        ArticleImage = :ArticleImage,
        ArticleDescription = :ArticleDescription,
        ArticleDate = NOW()
        WHERE ArticleID = :ArticleID
        ";

        $stmt = $this->pdo->prepare($sql);
          
        $stmt->bindParam(':ArticleName', $this->ArticleName);
        $stmt->bindParam(':ArticleCategorie', $this->ArticleCategorie);
        $stmt->bindParam(':ArticleImage', $this->ArticleImage);
        $stmt->bindParam(':ArticleDescription', $this->ArticleDescription);
        $stmt->bindParam(':ArticleID', $this->ArticleID);

        $this->setArticleName($ArticleName);
        $this->setArticleCategorie($ArticleCategorie);
        $this->setArticleImage($ArticleImage);
        $this->setArticleDescription($ArticleDescription);
        $this->setArticleID($ArticleID);


        $stmt->execute();
       
    }

    // Supprimer un article
    public function deleteArticle(int $ArticleID)
    {
        $sql = "DELETE FROM Article
        WHERE ArticleID = :ArticleID
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':ArticleID', $ArticleID);

        $stmt->execute();

        
    }

    //Compter le nombre d'article
    public function countArticle(string $ArticleCategorie)
    {
        $sql = "SELECT
        COUNT(ArticleID)
        FROM Article
        WHERE ArticleCategorie = :ArticleCategorie
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(":ArticleCategorie", $ArticleCategorie);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_NUM)[0];

    }

    // Afficher les articles par date
    public function showArticle(int $PerPage, int $OffSet , string $ArticleCategorie)
    {
        $sql = "SELECT *
        FROM Article
        WHERE ArticleCategorie = :ArticleCategorie
        ORDER BY ArticleDate
        DESC LIMIT $PerPage
        OFFSET $OffSet
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(":ArticleCategorie", $ArticleCategorie);

        $stmt->execute();

        return $stmt->fetchAll();



    }

    // Obtenir un article
    public function getOneArticle(int $ArticleID)
    {
        $sql = "SELECT *
        FROM Article
        WHERE
        ArticleID = :ArticleID
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ArticleID', $ArticleID);
        $stmt->execute();
        return $stmt->fetch();
    }

};

