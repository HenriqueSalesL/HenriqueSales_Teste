<?php

include_once 'conexao.php';

$querySelect = $link->query("Select * from motoristas");
while($registros = $querySelect->fetch_assoc()):
	$idMotorista = $registros['idMotorista'];
	$nomeMotorista = $registros['nomeMotorista'];
	$dataMotorista = $registros['dataMotorista'];
	$cpfMotorista  = $registros['cpfMotorista'];
	$sexoMotorista = $registros['sexoMotorista'];
	$statusMotorista = $registros['statusMotorista'];
	
	
	
	echo "<tr>";
	echo "<td>$nomeMotorista</td><td>$dataMotorista</td><td>$cpfMotorista</td><td>$statusMotorista</td><td>$sexoMotorista</td><td><a href='database/deleteMot.php?idMotorista=$idMotorista'><span>X</span></td>";
	echo "</tr>";


endwhile;
?>