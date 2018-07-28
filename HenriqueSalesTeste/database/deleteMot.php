<?php
include_once 'conexao.php';

$idMotorista = filter_input(INPUT_GET, 'idMotorista', FILTER_SANITIZE_SPECIAL_CHARS);
$queryDelete = $link->query("delete from motoristas where idMotorista = '$idMotorista'");

if(mysqli_affected_rows($link) > 0):
	header("Location:../cadMotorista.php");
endif;


?>