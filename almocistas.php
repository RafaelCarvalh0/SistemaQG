<?php

require_once 'config.php';
require_once 'models/Auth.php';
include 'confirmacao_action.php';

function naoConfirmado($con)
{
    $sql = ("SELECT * FROM usuarios WHERE journey = '10:00 AS 14:00'");
    $result = mysqli_query($con, $sql);
    //$rows = mysqli_num_rows($result);
    $usuarios = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $usuarios;
}

function postos($con)
{
    $sql_consultar = ("SELECT department, qtd_vigilantes FROM postos");
    $result_consultar = mysqli_query($con, $sql_consultar);
    $postos = mysqli_fetch_all($result_consultar, MYSQLI_ASSOC);

    return $postos;
}

function limparAlmocista($con, $id)
{
    $sql = ("UPDATE usuarios SET confirmado = 0 WHERE journey = '10:00 AS 14:00'");
    $result = mysqli_query($con, $sql);
    $resultado = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $resultado;
}

$usuarios = naoConfirmado($con);
$postos = postos($con);


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/estilo.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body class="container topo">

    <?php require 'partials/header.php'; ?>

    <div class="container-fluid">
        <div class="jantista row justify-content-center">


            <?php foreach ($postos as $posto) : ?>

                <?php foreach ($usuarios as $usuario) : ?>

                    <?php if ($usuario['department'] == $posto['department']) : ?>
            
                            <?php if ($agora < $inicio_jantista || $agora > $fim_jantista) : ?>

                                <?php limparAlmocista($con, $id); ?>

                            <?php endif; ?>

                        <?php if ($usuario['confirmado'] == 1) : ?>
            
                            <div class="col-sm-3 offset-1">
                                <b>RE: </b> <?= $usuario['re']; ?> <br>
                                <b>ALMOCISTA:</b> <?= $usuario['name']; ?> <br>
                                <b>POSTOS:</b> <?= $usuario['department']; ?> <br>
                                <b>HORÁRIO:</b> <?= $usuario['journey']; ?>
                            </div>

                        <?php endif; ?>

                        <?php if ($usuario['confirmado'] == 0) : ?>

                            <div id="jantista-nao-confirmado" class="col-sm-3 offset-1">
                                <b>RE: </b> <?= $usuario['re']; ?> <br>
                                <b>ALMOCISTA:</b> <?= $usuario['name']; ?> <br>
                                <b>POSTOS:</b> <?= $usuario['department']; ?> <br>
                                <b>HORÁRIO:</b> <?= $usuario['journey']; ?>
                            </div>

                        <?php endif; ?>

                    <?php endif; ?>

                <?php endforeach; ?>

            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
