<aside class="rightbar" method="post">
	<table class="table table-hover" >
		<nav class="navbar navbar-default">
				<div class="navbar-header">
				<a class="navbar-brand">Motoristas</a>
				</div>
		</nav>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Data/Nasc</th>
					<th>CPF</th>
					<th>Status</th>
					<th>Sexo</th>
					<th>Excluir<th>
				</tr>
			</thead>	
				<?php include_once 'database/readMot.php'; ?>
			</tbody>
	</table>
		 
</aside>