/* modèle: nomtable_nomchamp */
/*
  chemin hipetrahany sary rehetra ../img/...png
  DROP DATABASE `Blog`;
*/

/*
Ny command SOURCE dia TSY MAHAZO atao anaty fichier.sql fa lasa executer en boucle
SOURCE /home/mizael/Dev/www/ChessTricks/models/database/Blog.sql;
*/

CREATE DATABASE IF NOT EXISTS `Blog`;
USE `Blog`;

/*Table utilisateur*/
/*Asina fonction  js onkeyup eo amle input type=text @UNIQUE(`UserName`)*/
CREATE TABLE `User`
(

    `UserID` SMALLINT NOT NULL AUTO_INCREMENT,
    `UserName` VARCHAR(255) BINARY NOT NULL,
    `UserPassword` VARCHAR(32) BINARY NOT NULL,
    `UserEmail` VARCHAR(25) BINARY NOT NULL, 
    `UserProfile` VARCHAR(50) NOT NULL,
    `UserRole` SET("USER", "ADMIN") DEFAULT "USER",

    PRIMARY KEY(`UserID`),
    UNIQUE(`UserName`)

);

/*Table article*/

CREATE TABLE `Article`
(

    `ArticleID` SMALLINT NOT NULL AUTO_INCREMENT,
    `ArticleName` VARCHAR(50) NOT NULL,
    `ArticleCategorie` SET("blog","puzzle"),
    `ArticleDate` DATETIME DEFAULT NOW(),
    `ArticleImage` VARCHAR(50) NOT NULl,
    `ArticleDescription` LONGTEXT NOT NULL,

    PRIMARY KEY(`ArticleID`)



);




/*Table commentaire */
/*
 *Relation plusieurs - plusieurs entre Article et l'utilisateur
 *Création de la table intermédiaire Commentaire
*/

CREATE TABLE `Comment`
(

    `CommentID` SMALLINT NOT NULL AUTO_INCREMENT,
    `CommentArticle` SMALLINT NOT NULL,
    `CommentUser` SMALLINT NOT NULL,
    `CommentText` LONGTEXT NOT NULL,
    `CommentDate` DATETIME DEFAULT NOW(),

    PRIMARY KEY(`CommentID`),

    CONSTRAINT FK_Article
    FOREIGN KEY(`CommentArticle`)
    REFERENCES `Article`(`ArticleID`)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
    
    CONSTRAINT FK_User
    FOREIGN KEY(`CommentUser`)
    REFERENCES `User`(`UserID`)
    ON DELETE CASCADE
    ON UPDATE RESTRICT


);


/*Insertion de l'administrateur*/
INSERT INTO `User`(
    UserName,
    UserPassword,
    UserEmail,
    UserProfile,
    UserRole
)
VALUES(
    "Mizael",
    "69",
    "mizaelanthony07@gmail.com",
    "../../img/admin/me.jpeg", 
    "ADMIN"
);



