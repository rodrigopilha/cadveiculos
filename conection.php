<?php

class conection{
     private $pdo;

     public function getcon(){
         try{
            $this->pdo = new PDO('mysql:dbname=sistema;host=localhost','root','');
            return $this->pdo;

         }catch(PDOException $e){
            echo "erro".$e->getMessage();
         }
        
     }
}