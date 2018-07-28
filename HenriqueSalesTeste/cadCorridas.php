<?php session_start() ?>
<?php include_once 'includes/header.inc.php'?>

<div class="container">
	
	<?php include_once 'includes/menu.inc.php'?>
	
	<div>
	<aside class="leftbar">
	
		<form action="database/createCorrida.php" method="post">
			<div class="form-group">
				<label for="">Passageiro</label><br>
				<?php 
				include_once 'database/conexao.php';
				
				 $sql = "SELECT nomePassageiro FROM passageiros ORDER BY nomePassageiro";
				 $resultado = mysqli_query($link,$sql) or die(mysql_error()."<br>Erro ao executar a inserção dos dados");

				if (mysqli_num_rows($resultado)!=0){
				 echo '<select name="nomePassageiro" id="nomePassageiro">
				 <option value=" " selected="selected">Escolha o passageiro:</option>';
				 while($elemento = mysqli_fetch_array($resultado))
				 {
				   $nomePassageiro = $elemento['nomePassageiro'];
				   echo '<option value="'.$nomePassageiro.'">'.$nomePassageiro.'</option>';
				 }
				 echo '</select>';
				}
				?>
			</div>
			<div class="form-group">
				<label>Lista de Motorista Ativos:</label><br>
				<?php 
				include_once 'database/conexao.php';
				
				 $sql = "SELECT nomeMotorista FROM motoristas WHERE statusMotorista = 'Ativo' ORDER BY nomeMotorista";
				 $resultado = mysqli_query($link,$sql) or die(mysql_error()."<br>Erro ao executar a inserção dos dados");

				if (mysqli_num_rows($resultado)!=0){
				 echo '<select name="nomeMotorista" id="nomeMotorista">
				 <option value=" " selected="selected">Escolha o motorista:</option>';
				 while($elemento = mysqli_fetch_array($resultado))
				 {
				   $nomeMotorista = $elemento['nomeMotorista'];
				   echo '<option value="'.$nomeMotorista.'">'.$nomeMotorista.'</option>';
				 }
				 echo '</select>';
				}
				?>
			</div>
			<div class="form-group">
				<label>Valor da corrida:</label>
				<input type="text" class="form-control" name="valorCorrida" id="valorCorrida" class="campo" "required placeholder">
			</div>
			<button type="submit" name ="registrar" value="registrar" class="btn btn-primary btn-lg">Adicionar</button>
			<?php 
				if(isset($_SESSION['msg'])):
					echo $_SESSION['msg'];
					session_unset();
				endif;
			?>
		</form>
	</aside>
	
	<?php include_once 'consultasCorridas.php'?>

			
	</div>
	<div class="Home" style="background-image:url(imagens/fundo2.png)">
	</div>
	
</div>

<?php include_once 'includes/footer.inc.php' ?> 