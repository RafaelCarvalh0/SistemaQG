<?php

require_once 'config.php';
require_once 'models/Auth.php';

error_reporting(0);

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$con = mysqli_connect("localhost", "root", "") or die("Sem conexão com o servidor");

$id = $_GET['id'];
$re = $_GET['re'];
$nome = $_GET['nome'];
$departamento = $_GET['departamento'];
$jornada = $_GET['jornada'];
$confirmado = $_GET['confirmado'];


mysqli_select_db($con, "qg_system") or die("Sem acesso ao DB, Entre em //contato com o Administrador");

/*
function inserir($con, $id, $re, $nome, $departamento, $jornada)
{
    $sql_inserir = ("INSERT INTO confirmados (id, re, name, department, journey) VALUES ('$id', '$re', '$nome', '$departamento', '$jornada')");
    $result_inserir = mysqli_query($con, $sql_inserir); 
    return $result_inserir;
}
*/

function atualizar($con, $id) {
    $sql = ("UPDATE usuarios SET confirmado = 1 WHERE id = '$id'");
    $result = mysqli_query($con, $sql);
    $resultado = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $resultado;
}

function consultar($con, $id)
{
    $sql_consultar = ("SELECT * FROM usuarios WHERE id = '$id'");
    $result_consultar = mysqli_query($con, $sql_consultar);
    $dados = mysqli_fetch_all($result_consultar, MYSQLI_ASSOC);
    return $dados;
}

$dados = consultar($con, $id);

?>

<!-- USUÁRIO COMUM E QUE AINDA NÃO CONFIRMOU -->


<?php if ($userInfo->perfil == 'comum' && $dados[0]['confirmado'] == 0) : ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
        <link rel="stylesheet" href="<?= $base; ?>/assets/css/estilo.css" />
    </head>

    <body id="body-confirmacao">

        <div id="logo-confirmacao">
            <img src="<?= $base; ?>/assets/images/LOGO QG2.png" width="250" alt="">
        </div>

        <div id="botao-sair">
            <h1 style="color: #54a767;">OBRIGADO BOM TRABALHO</h1>
            <a href="<?= $base; ?>/login.php">
                <button> SAIR </button>
            </a>
        </div>

    </body>

    <?php atualizar($con, $id); ?>

<? endif; ?>
