<?php

include_once 'conexao.php';

$querySelect = $link->query("Select * from corridas");
while($registros = $querySelect->fetch_assoc()):
	$nomePassageiro = $registros['nomePassageiro'];
	$nomeMotorista = $registros['nomeMotorista'];
	$valorCorrida = $registros['valorCorrida'];

	echo "<tr>";
	echo "<td>$nomePassageiro</td><td>$nomeMotorista</td><td>$valorCorrida</td>";
	echo "</tr>";


endwhile;
?>