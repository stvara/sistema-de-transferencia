<?php

try{

    $conectar = new PDO("mysql:host=localhost;port=3306;dbname=usuarios","root","cpd");
   // echo "conectado";
} catch(PDOException $e){
    echo 'Falha ao conectar com o banco de dados '.$e->getMessage();
}   


