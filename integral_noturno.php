<?php

require_once 'config.php';
require_once 'models/Auth.php';
include 'confirmacao_action.php';


function naoConfirmado($con)
{
    $sql = ("SELECT re, name, department, journey FROM usuarios WHERE journey = '18:00 AS 06:00'");
    $result = mysqli_query($con, $sql);
    //$rows = mysqli_num_rows($result);
    $naoConfirmados = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $naoConfirmados;
}

function confirmado($con)
{
    $sql_consultar = ("SELECT re, name, department, journey FROM confirmados");
    $result_consultar = mysqli_query($con, $sql_consultar);
    $confirmados = mysqli_fetch_all($result_consultar, MYSQLI_ASSOC);

    return $confirmados;
}

function deletarNoturno($con)
{

    $query = ("DELETE FROM confirmados WHERE journey = '18:00 AS 06:00'");
    return mysqli_query($con, $query);
}

$nao_confirmados = naoConfirmado($con);
$confirmados = confirmado($con);


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/estilo.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body class="topo">


    <div class="container-fluid w-100">
        <div id="linha" class="row justify-content-center">

        <a href="" class="col-4 col-sm-2"><b>USP</b>
                <p>DIREITO</p>
            </a>

        </div>

    </div>


</body>

</html>