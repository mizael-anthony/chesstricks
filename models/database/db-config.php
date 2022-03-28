<?php
/** Configuration de la base de donnée */
$Connection = function()
{
    $DB_DSN = 'mysql:host=localhost;dbname=Blog';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_PDO_OPTIONS = 
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]; 
    
    $pdo = new PDO(
        $DB_DSN,
        $DB_USER,
        $DB_PASS,
        $DB_PDO_OPTIONS
    );
    
    return $pdo;
};

$Check = function($variable)
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
    die();
};