<?php 

include_once 'database/conexao.php';


 $sql = "SELECT nomePassageiro FROM passageiros ORDER BY nomePassageiro";
 $resultado = mysqli_query($link,$sql) or die(mysql_error()."<br>Erro ao executar a inserção dos dados");

if (mysqli_num_rows($resultado)!=0){
 echo '<select name="passageiros" id="passageiros">
 <option value=" " selected="selected">Escolha o passageiro:</option>';
 while($elemento = mysqli_fetch_array($resultado))
 {
   $nomePassageiro = $elemento['nomePassageiro'];
   echo '<option value="'.$nomePassageiro.'">'.$nomePassageiro.'</option>';
 }
 echo '</select>';
}


?>