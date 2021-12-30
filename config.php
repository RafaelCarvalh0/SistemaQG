<?php

session_start();
$base = 'http://localhost/QG_System';

$db_name = 'qg_system';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

//PEGANDO DATA E HORA ATUAL E HORÁRIO DOS JANTISTAS
$agora = date('d/m/Y H:i');
$inicio_almocista = date('d/m/Y '.'09:50');    //09:50
$fim_almocista = date('d/m/Y '.'14:00');      //14:00
$inicio_jantista = date('d/m/Y '.'18:50');  //18:50
$fim_jantista = date('d/m/Y '.'23:00');    //23:00

//INTEGRAL NOTURNO
$inicio_noturno = date('d/m/Y '.'17:50');    //17:50
$fim_noturno = date('d/m/Y '.'06:00');   //06:00


$pdo = new PDO("mysql:dbname=".$db_name.";host".$db_host, $db_user, $db_pass);