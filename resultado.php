<?php
header("Content-type: text/html; charset-utf8");

//var_dump($_POST);

//variáveis
$valor = 0.00;
$moeda = "";
$result_conv = "";
$peso= 0.00;
$altura= 0.00;
$imc = 0.00;

//lógica
if (isset($_POST["resultado"]) && 
    isset($_POST["valor"]) && !empty($_POST["valor"]) && 
    isset($_POST["peso"]) && !empty($_POST["peso"]) && 
    isset($_POST["altura"]) && !empty($_POST["altura"])) {
        $valor = $_POST["valor"];
        $peso = $_POST["peso"];
        $altura = $_POST["altura"];
        if ($_POST["moeda"] == "real") {
            $moeda = "reais";
            $result_conv = number_format($valor / 5.52, 2, ",", ".") . " dólares";
        }else{
            $moeda = "dólares";
            $result_conv = number_format($valor * 5.52, 2, ",", ".") . " reais";
        }
        $imc = $peso / ($altura * $altura);
}else{
    header("location: index.html");
}

?>

<!--Corpo da página(HTML)-->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Resultado</title>
</head>

<body class="bg-dark text-light text-center">
    <h1 style="margin: 8vh">Conversão</h1>
    <h3 style="margin: 8vh"><?php echo(number_format($valor, 2, ",", ".") . " " . $moeda . " é igual a " . $result_conv) ?></h3>
    <h1 style="margin: 8vh">IMC</h1>
    <h3 style="margin: 8vh"><?php echo("O seu IMC é: " . number_format($imc, 2, ",", ".") ) ?></h3>
    <a href="index.html" class="btn btn-success" name="voltar" id="voltar" style="margin: 8vh">Voltar</a>
</body>
</html>