<aside class="rightbar" method="post">
	<table class="table table-hover" >
		<nav class="navbar navbar-default">
				<div class="navbar-header">
				<a class="navbar-brand">Passageiros</a>
				</div>
		</nav>
			<thead>
			  <tr>
				<th>Nome</th>
				<th>Data de Nascimento</th>
				<th>CPF</th>
				<th>Sexo</th>
				<th>Excluir<th>
			  </tr>
			</thead>
			<tbody>
			<?php include_once 'database/readPass.php'; ?>
			</tbody>
	</table>
		 
</aside>

