<?php
//Je me connecte à la base de donnée
class Database{
        
        protected function bddconnect(){

                $bdd = new PDO('mysql:host=localhost;dbname=todotask;charset=utf8', 'root', 'root');
                $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
                return $bdd;
        }
        
}
//Faire un fichier a part

