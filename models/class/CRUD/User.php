<?php


/*classe utilisateur reflettant la table User */

/**
 * stmt : statement(requête préparées)
 *  $this->pdo : interface PDO
 */
namespace App\CRUD;
use PDO;
class User
{

    private $UserID;
    private $UserName;
    private $UserPassword;
    private $UserEmail;
    private $UserProfile;
    private $UserRole;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserID(){return $this->UserID;}
    public function setUserID($UserID){$this->UserID = $UserID;}

    public function getUserName(){return $this->UserName;}
    public function setUserName($UserName){$this->UserName = $UserName;}

    public function getUserPassword(){return $this->UserPassword;}
    public function setUserPassword($UserPassword){$this->UserPassword = $UserPassword;}

    public function getUserEmail(){return $this->UserEmail;}
    public function setUserEmail($UserEmail){$this->UserEmail = $UserEmail;}

    public function getUserProfile(){return $this->UserProfile;}
    public function setUserProfile($UserProfile){$this->UserProfile = $UserProfile;}

    public function getUserRole(){return $this->UserRole;}
    public function setUserRole($UserRole){$this->UserRole = $UserRole;}


    // Créer un utilisateur
    public function createUser(string $UserName, string $UserPassword, string $UserEmail, string $UserProfile)
    {

        $sql = "INSERT INTO User(
        UserName,
        UserPassword,
        UserEmail,
        UserProfile
        )
        VALUES(
        :UserName,
        :UserPassword,
        :UserEmail,
        :UserProfile
        )";

        $stmt = $this->pdo->prepare($sql);
          
        $stmt->bindParam(':UserName', $this->UserName);
        $stmt->bindParam(':UserPassword', $this->UserPassword);
        $stmt->bindParam(':UserEmail', $this->UserEmail);
        $stmt->bindParam(':UserProfile', $this->UserProfile);

        $this->setUserName($UserName);
        $this->setUserPassword($UserPassword);
        $this->setUserEmail($UserEmail);
        $this->setUserProfile($UserProfile);

        $stmt->execute();

    }

    // Trouver un(des) utilisateur(s) avec l'article
    public function retrieveUser(string $UserName)
    {
        $sql = "SELECT 
        UserName,
        UserProfile,
        ArticleID,
        ArticleName,
        ArticleDate,
        ArticleImage,
        ArticleDescription
        FROM Article
        INNER JOIN(User
        INNER JOIN Comment
        ON User.UserID = Comment.CommentUser)
        ON Article.ArticleID = Comment.CommentArticle
        WHERE
        UserName = :UserName OR
        UserName LIKE CONCAT('%', :UserName) OR
        UserName LIKE CONCAT(:UserName, '%') OR
        UserName LIKE CONCAT('%', :UserName, '%')
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':UserName', $UserName);

        $stmt->execute();

        return $stmt->fetchAll();
        
    }

    // Modifier un utilisateur
    public function updateUser(int $UserID, string $UserName, string $UserPassword, string $UserEmail, string $UserProfile)
    {
        $sql = "UPDATE User
        SET
        UserName = :UserName,
        UserPassword = :UserPassword,
        UserEmail = :UserEmail,
        UserProfile = :UserProfile
        WHERE UserID = :UserID
        ";

        $stmt = $this->pdo->prepare($sql);
          
        $stmt->bindParam(':UserName', $this->UserName);
        $stmt->bindParam(':UserPassword', $this->UserPassword);
        $stmt->bindParam(':UserEmail', $this->UserEmail);
        $stmt->bindParam(':UserProfile', $this->UserProfile);
        $stmt->bindParam(':UserID', $this->UserID);

        $this->setUserName($UserName);
        $this->setUserPassword($UserPassword);
        $this->setUserEmail($UserEmail);
        $this->setUserProfile($UserProfile);

        $stmt->execute();
       
    }

    // Supprimer un utilisateur
    public function deleteUser(int $UserID)
    {
        $sql = "DELETE FROM User
        WHERE UserID = :UserID
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':UserID', $UserID);

        $stmt->execute();

        
    }

    //Compter le nombre d'utilisateur
    public function countUser()
    {
        $sql = "SELECT COUNT(UserID) FROM User";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_NUM)[0];

    }

    //Obtenir un utilisateur

    public function getOneUser(string $UserName, string $UserPassword)
    {

        $sql = "SELECT *
        FROM User
        WHERE UserName = :UserName AND
        UserPassword = :UserPassword
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':UserName', $UserName);
        $stmt->bindParam(':UserPassword', $UserPassword);
        $stmt->execute();

        return $stmt->fetch();
    }

    // Verifier si utilisateur est connecté

    public static function isConnected()
    {
        if(session_status() === PHP_SESSION_NONE)
        {
            session_start();

        }
    
        return !empty($_SESSION);
    }

        // Afficher les utilisateurs inscrit
        public function showUser()
        {
            $sql = "SELECT *
            FROM User
            WHERE UserRole = 'USER'";
    
            $stmt = $this->pdo->prepare($sql);
    
            $stmt->execute();
    
            return $stmt->fetchAll();
    
    
        }
    
}
