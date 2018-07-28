<?php

include_once 'conexao.php';

$querySelect = $link->query("Select * from passageiros");
while($registros = $querySelect->fetch_assoc()):
	$idPassageiro = $registros['idPassageiro'];
	$nomePassageiro = $registros['nomePassageiro'];
	$dataPassageiro = $registros['dataPassageiro'];
	$cpfPassageiro  = $registros['cpfPassageiro'];
	$sexoPassageiro = $registros['sexoPassageiro'];
	
	
	
	echo "<tr>";
	echo "<td>$nomePassageiro</td><td>$dataPassageiro</td><td>$cpfPassageiro</td><td>$sexoPassageiro</td><td><a href='database/deletePass.php?idPassageiro=$idPassageiro'><span>X</span></td>";
	echo "</tr>";


endwhile;
?>