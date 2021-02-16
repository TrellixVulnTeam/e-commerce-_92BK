<?php
namespace aps\database;

use PDO;
use PDOException;

abstract class connexion{
    public $db;
    
    public function __construct()
    {
        $this->db = null;
    }

    public  function connecter(){
        try {
            $this->db = new PDO("mysql:host=127.0.0.1;dbname=e-commerce","root");
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


            $sql = "CREATE  TABLE IF NOT EXISTS personne(
                id int unsigned PRIMARY KEY AUTO_INCREMENT,
                nom varchar(30) NOT NULL,
                prenom varchar(30) NOT NULL,
                tel int(30) unsigned NOT NULL,
                email varchar(30) NOT NULL,
                pass varchar(100) NOT NULL,
                UNIQUE(email) )";

            $this->db->exec($sql);


            $sql = "CREATE TABLE IF NOT EXISTS `article` ( `id` INT unsigned NOT NULL AUTO_INCREMENT , `img` TINYBLOB NOT NULL , `prix` INT unsigned NOT NULL , `commentaire` TEXT(1000) NOT NULL , PRIMARY KEY (`id`))";

            $this->db->exec($sql);

            $sql = "CREATE  TABLE IF NOT EXISTS `admin` (`id` int unsigned AUTO_INCREMENT PRIMARY KEY,`nom` varchar(20),`prenom` varchar(30),`email` varchar(100),pass varchar(100))";

            $this->db->exec($sql);


        } catch (PDOException $e) {
            
            echo $e->getMessage();
        }
    }

    

}