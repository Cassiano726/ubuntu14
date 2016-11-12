<?php


$host = "localhost";
$usuario = "root";
$senha = "root";
$db    = "pizzaria_italiana";


$mysqli = new mysqli($host,$usuario,$senha,$db);

if($mysqli->connect_error){
    
    echo 'Falha ao conecta-se ao banco!'. $mysqli->connect_errno;
}