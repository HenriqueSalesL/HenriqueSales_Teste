<?php
session_start();
include_once 'conexao.php';

$nomeMotorista = filter_input(INPUT_POST, 'nomeMotorista', FILTER_SANITIZE_SPECIAL_CHARS);
$dataMotorista = filter_input(INPUT_POST, 'dataMotorista', FILTER_SANITIZE_NUMBER_INT);
$cpfMotorista  = filter_input(INPUT_POST, 'cpfMotorista', FILTER_SANITIZE_NUMBER_INT);
$sexoMotorista = filter_input(INPUT_POST, 'sexoMotorista', FILTER_SANITIZE_SPECIAL_CHARS);
$statusMotorista = filter_input(INPUT_POST, 'statusMotorista', FILTER_SANITIZE_SPECIAL_CHARS);
if ($sexoMotorista == M):
		$sexoMotorista = Masculino;
	endif;
	
	if ($sexoMotorista == F):
		$sexoMotorista = Feminino;
	endif;
$queryInsert = $link->query("insert into motoristas values(default,'$nomeMotorista','$dataMotorista','$cpfMotorista','$sexoMotorista','$statusMotorista')");
$affected_rows = mysqli_affected_rows($link);

if($affected_rows > 0):
	$_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com sucesso!'."<br>";
	header("Location:../cadMotorista.php");
endif;
?>