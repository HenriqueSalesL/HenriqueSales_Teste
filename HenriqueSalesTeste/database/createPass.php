<?php
session_start();
include_once 'conexao.php';

$nomePassageiro = filter_input(INPUT_POST, 'nomePassageiro', FILTER_SANITIZE_SPECIAL_CHARS);
$dataPassageiro = filter_input(INPUT_POST, 'dataPassageiro', FILTER_SANITIZE_NUMBER_INT);
$cpfPassageiro  = filter_input(INPUT_POST, 'cpfPassageiro', FILTER_SANITIZE_NUMBER_INT);
$sexoPassageiro = filter_input(INPUT_POST, 'sexoPassageiro', FILTER_SANITIZE_SPECIAL_CHARS);
if ($sexoPassageiro == M):
		$sexoPassageiro = Masculino;
	endif;
	
	if ($sexoPassageiro == F):
		$sexoPassageiro = Feminino;
	endif;
$queryInsert = $link->query("insert into passageiros values(default,'$nomePassageiro','$dataPassageiro','$cpfPassageiro','$sexoPassageiro')");
$affected_rows = mysqli_affected_rows($link);

if($affected_rows > 0):
	$_SESSION['msg'] = "<p>".'Cadastro efetuado com sucesso!'."<br>";
	header("Location:../cadPassageiro.php");
endif;
?>