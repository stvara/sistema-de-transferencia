<?php
include_once 'conexao.php';
$email ="12@gmail.com";
$consulta = $conectar->query("SELECT count(*) FROM comprador");
$verificador = $consulta->fetch(PDO::FETCH_ASSOC);
$verifica = $verificador['count(*)'];
print_r($verifica);


