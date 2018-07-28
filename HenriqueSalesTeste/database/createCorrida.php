<?php
session_start();
include_once 'conexao.php';

$nomePassageiro = filter_input(INPUT_POST, 'nomePassageiro', FILTER_SANITIZE_SPECIAL_CHARS);
$nomeMotorista = filter_input(INPUT_POST, 'nomeMotorista', FILTER_SANITIZE_SPECIAL_CHARS);
$valorCorrida = filter_input(INPUT_POST, 'valorCorrida', FILTER_SANITIZE_NUMBER_INT);

$queryInsert = $link->query("insert into corridas values(default,'$nomePassageiro','$nomeMotorista','$valorCorrida')");
$affected_rows = mysqli_affected_rows($link);

if($affected_rows > 0):
	$_SESSION['msg'] = "<p>".'Cadastro de corrida efetuado com sucesso!'."<br>";
	header("Location:../cadCorridas.php");
endif;
?>