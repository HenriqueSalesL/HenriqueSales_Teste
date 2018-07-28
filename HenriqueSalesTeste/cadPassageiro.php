<?php session_start() ?>

<?php include_once 'includes/header.inc.php'?>

<div class="container">
	
	<?php include_once 'includes/menu.inc.php'?>
	<div>
	<aside class="leftbar">
	
		<form action="database/createPass.php" method="post">
			
			<div id="aviso"></div>
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" class="form-control" name="nomePassageiro" id="nomePassageiro" class="campo" maxlength="40" required autofocus placeholder="Digite o nome...">
			</div>
			<div class="form-group">
				<label>Data de Nascimento:</label>
				<input type="date" class="form-control" name="dataPassageiro" id="dataPassageiro" class="campo" maxlength="40" required placeholder="Digite a data de nascimento...">
			</div>
			<div class="form-group">
				<label>CPF:</label>
				<input type="text" class="form-control" name="cpfPassageiro" id="cpfPassageiro" class="campo" maxlength="40" required placeholder="Digite o cpf...">
			</div>
			<tr>
                                <td>Sexo:</td>
                                <td>
                                        <select name="sexoPassageiro" id="sexoPassageiro">
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
	
	<?php include_once 'consultasPass.php'?>
	
</div>
 
<?php include_once 'includes/footer.inc.php' ?> 