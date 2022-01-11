<?php

class conexao
{
   private $pdo;

   public function getcon()
   {
      try {
         $this->pdo = new PDO('mysql:dbname=franciscocastro;host=localhost', 'root', '');
         return $this->pdo;
      } catch (PDOException $e) {
         echo "erro" . $e->getMessage();
      }
   }
}
