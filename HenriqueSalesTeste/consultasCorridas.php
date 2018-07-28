<aside class="rightbar" method="post">
	<table class="table table-hover" >
		<nav class="navbar navbar-default">
				<div class="navbar-header">
				<a class="navbar-brand">Corridas</a>
				</div>
		</nav>
			<thead>
			  <tr>
				<th>Nome do Passageiro</th>
				<th>Nome do Motorista</th>
				<th>Valor da Corrida</th>
			  </tr>
			</thead>
			<tbody>
			<?php include_once 'database/readCorridas.php'; ?>
			</tbody>
	</table>
		 
</aside>
