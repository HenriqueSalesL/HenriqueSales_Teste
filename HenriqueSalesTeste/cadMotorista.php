<?php session_start() ?>

<?php include_once 'includes/header.inc.php'?>

<div class="container">
	
	<?php include_once 'includes/menu.inc.php'?>
	<div>
	<aside class="leftbar">
	
		<form action="database/createMot.php" method="post">
			
			<div id="aviso"></div>
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" class="form-control" name="nomeMotorista" id="nomeMotorista" class="campo" maxlength="40" required autofocus placeholder="Digite o nome...">
			</div>
			<div class="form-group">
				<label>Data de Nascimento:</label>
				<input type="date" class="form-control" name="dataMotorista" id="dataMotorista" class="campo" maxlength="40" required placeholder="Digite a data de nascimento...">
			</div>
			<div class="form-group">
				<label>CPF:</label>
				<input type="text" class="form-control" name="cpfMotorista" id="cpfMotorista" class="campo" maxlength="40" required placeholder="Digite o cpf...">
			</div>
			<tr>
                                <td>Status:</td>
                                <td>
                                        <select name="statusMotorista" id="statusMotorista">
                                                <option value="Ativo">Ativo</option>
                                                <option value="Inativo">Inativo</option>
                                        </select>
                                </td>
            </tr>
			<tr>
                                <td>Sexo:</td>
                                <td>
                                        <select name="sexoMotorista" id="sexoMotorista">
                                                <option value="F">F</option>
                                                <option value="M">M</option>
                                        </select>
                                </td>
                        </tr><br>
			<button type="submit" name ="registrar" value="registrar" class="btn btn-primary btn-lg">Adicionar</button>
			<?php 
				if(isset($_SESSION['msg'])):
					echo $_SESSION['msg'];
					session_unset();
				endif;
			?>
		</form>
	</aside>
	
	<?php include_once 'consultasMot.php'?>

	
</div>
 
<?php include_once 'includes/footer.inc.php' ?> 