<?php

require_once 'config.php';
require_once 'models/Auth.php';
include 'confirmacao_action.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

function postos($con)
{
    $sql_consultar = ("SELECT department, qtd_vigilantes FROM postos");
    $result_consultar = mysqli_query($con, $sql_consultar);
    $postos = mysqli_fetch_all($result_consultar, MYSQLI_ASSOC);

    return $postos;
}

function naoConfirmado($con)
{
    $sql = ("SELECT re, name, department, journey, confirmado FROM usuarios WHERE (journey = '18:00 AS 06:00') OR (journey = '18:00 AS 00:00') OR (journey = '10:00 AS 22:00')");
    $result = mysqli_query($con, $sql);
    //$rows = mysqli_num_rows($result);
    $usuarios = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $usuarios;
}

function limparPosto($con, $id)
{
    $sql = ("UPDATE usuarios SET confirmado = 0  WHERE (journey = '18:00 AS 06:00') OR (journey = '18:00 AS 00:00') OR (journey = '10:00 AS 22:00')");
    $result = mysqli_query($con, $sql);
    $resultado = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $resultado;
}

$postos = postos($con);
$usuarios = naoConfirmado($con);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta department="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/estilo.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body class="container topo">

    <?php require 'partials/header.php'; ?>

    <div class="container">
        <div id="linha" class="row justify-content-center">

            <?php foreach ($postos as $posto) : ?>

                <?php foreach ($usuarios as $usuario) : ?>

                    <?php if ($usuario['department'] == $posto['department']) : ?>
            
                            <?php if ($agora < $inicio_noturno && $agora > $fim_noturno) : ?>

                                <?php limparPosto($con, $id); ?>

                            <?php endif; ?>

                        <?php if ($usuario['confirmado'] == 1) : ?>

                            <div style="background-color: #01b18bb6;" class="col-4 col-sm-2">
                                <b id="usp">USP</b>
                                <p><?= $posto['department']; ?></p>
                                <hr>
                                <p><?= $usuario['re']; ?></p>
                                <p><?= $usuario['name']; ?></p>
                                <p><?= $usuario['journey']; ?></p>
                            </div>

                        <?php endif; ?>


                        <?php if ($usuario['confirmado'] == 0) : ?>

                            <div class="col-4 col-sm-2">
                                <b id="usp">USP</b>
                                <p><?= $posto['department']; ?></p>
                                <hr>
                                <p><?= $usuario['re']; ?></p>
                                <p><?= $usuario['name']; ?></p>
                                <p><?= $usuario['journey']; ?></p>
                            </div>

                        <?php endif; ?>

                    <?php endif; ?>

                <?php endforeach; ?>

            <?php endforeach; ?>


        </div>

    </div>

</body>

</html>

