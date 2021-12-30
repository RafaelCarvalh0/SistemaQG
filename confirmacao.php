<?php

require_once 'config.php';
require_once 'models/Auth.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$id = $userInfo->id;
$re = $userInfo->re;
$jantista = $userInfo->name;
$departamento = $userInfo->department;
$jornada = $userInfo->journey;


?>

<!--ALERTA DE LOGIN PARA INTEGRAL NOTURNO CONFIRMANDO FORA DE HORA -->
<?php if ($jornada == '18:00 AS 06:00') : ?>

    <?php if ($agora < $inicio_noturno && $agora > $fim_noturno || $agora > $fim_noturno && $agora < $inicio_noturno) : ?>

        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>

            <script src="<?= $base; ?>/assets/js/confirmacao.js"></script>

            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="<?= $base; ?>/assets/css/estilo.css">


        </head>

        <body class="container topo">

            <header>
                <div id="logo-tela-confirmar">
                    <img src="<?= $base; ?>/assets/images/LOGO QG2.png" width="250" alt="">
                </div>

            </header>

            <div id="botao-sair">

                <h1>
                    FORA DO HORÁRIO DE TRABALHO!
                </h1>

                <a href="<?= $base; ?>/login.php">
                    <button> SAIR </button>
                </a>
            </div>

        </body>

        </html>

        <?php exit; ?>

    <?php endif; ?>

<?php endif; ?>


<!--ALERTA DE LOGIN PARA ALMOCISTA CONFIRMANDO FORA DE HORA -->

<?php if ($jornada == '10:00 AS 14:00') : ?>

    <?php if ($agora < $inicio_almocista || $agora > $fim_almocista) : ?>

        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>

            <script src="<?= $base; ?>/assets/js/confirmacao.js"></script>

            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="<?= $base; ?>/assets/css/estilo.css">


        </head>

        <body class="container topo">

            <header>
                <div id="logo-tela-confirmar">
                    <img src="<?= $base; ?>/assets/images/LOGO QG2.png" width="250" alt="">
                </div>

            </header>

            <div id="botao-sair">

                <h1>
                    FORA DO HORÁRIO DE TRABALHO!
                </h1>

                <a href="<?= $base; ?>/login.php">
                    <button> SAIR </button>
                </a>
            </div>

        </body>

        </html>

        <?php exit; ?>

    <?php endif; ?>

<?php endif; ?>


<!--ALERTA DE LOGIN PARA JANTISTA CONFIRMANDO FORA DE HORA -->

<?php if ($jornada == '19:00 AS 23:00') : ?>

    <?php if ($agora < $inicio_jantista || $agora > $fim_jantista) : ?>

        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>

            <script src="<?= $base; ?>/assets/js/confirmacao.js"></script>

            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="<?= $base; ?>/assets/css/estilo.css">


        </head>

        <body class="container topo">

            <header>
                <div id="logo-tela-confirmar">
                    <img src="<?= $base; ?>/assets/images/LOGO QG2.png" width="250" alt="">
                </div>

            </header>

            <div id="botao-sair">
                <h1>
                    FORA DO HORÁRIO DE TRABALHO!
                </h1>
                <a href="<?= $base; ?>/login.php">
                    <button> SAIR </button>
                </a>
            </div>

        </body>

        </html>

        <?php exit; ?>

    <?php endif; ?>

<?php endif; ?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/estilo.css">
    <script src="<?= $base; ?>/assets/js/confirmacao.js"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body class="container topo">

    <header>
        <div class="header2">
            <img src="<?= $base; ?>/assets/images/LOGO QG2.png" width="700" alt="">
        </div>

    </header>

    <div id="aviso">
        CONFIRME SEU POSTO DE TRABALHO
    </div>


    <div class="container-fluid">
        <div class="jantista row">

            <!--Formulário do jantista -->

            <div id="campo-form">

                <b>VIGILANTE: </b> <?= $jantista; ?><br>

                <b>DEPARTAMENTO: </b> <?= $departamento; ?><br>

                <b>JORNADA: </b> <?= $jornada; ?><br>

                <a href="confirmacao_action.php?id=<?= $id; ?>&&re=<?= $re; ?>&&nome=<?= $jantista; ?>&&departamento=<?= $departamento; ?>&&jornada=<?= $jornada; ?>"> <button id="botao" type="submit">CONFIRMAR ENTRADA</button> </a>


            </div>

        </div>
    </div>

    </div>
    </div>



</body>

</html>