<?php
include_once 'conexao.php';

$idPassageiro = filter_input(INPUT_GET, 'idPassageiro', FILTER_SANITIZE_SPECIAL_CHARS);
$queryDelete = $link->query("delete from passageiros where idPassageiro = '$idPassageiro'");

if(mysqli_affected_rows($link) > 0):
	header("Location:../cadPassageiro.php");
endif;


?>