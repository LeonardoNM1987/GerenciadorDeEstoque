<?php 
	declare(strict_types=1);	
	require_once "connect.php";
	require_once "Produto.php";
	if(!isset($_SESSION)){session_start();} 
	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>Document</title>
</head>
<body>	
<main>

<h1>Manipulação dos Registros</h1>

<div class="container main-crud">






























	
	<div class="container-insert">
		
			<fieldset>
				<legend>Inserir</legend>
					<form action="insert.php" method="post">
						<label for="user">Usuário:</label><input type="text" name="user"><br>
						<label for="senha">Senha:</label><input type="text" name="senha"><br>
						<input type="submit" value="Inserir">
						<div class="campo-mensagem">
						<?php
							if(isset($_SESSION['insertSucesso'])){
								echo $_SESSION['insertSucesso'];
								$_SESSION['insertSucesso'] = null;								
							}
							if(isset($_SESSION['deleteErro'])){
								echo $_SESSION['deleteErro'];
								$_SESSION['deleteErro'] = null;
							}
						?>
						</div>
					</form>
			</fieldset>
	</div>

	<div class="container-update">		
			<fieldset>
				<legend>Alterar</legend>
					<form action="update.php" method="post">
					<label for="id">Qual ID:</label>
						<select name="id" id="ids">
							<?php
								foreach(conectarBanco()->query('select idusuario from tb_usuarios;') as $key => $value){		
									$temp = $value['idusuario'];
									echo "<option value='$temp'>$temp</option> <br>";
								}
							?>
						</select><br>	
						<label for="user">Usuario:</label><input type="text" name="user"><br>
						<label for="senha">Senha:</label><input type="text" name="senha"><br>
						<input type="submit" value="Atualizar">
						<div class="campo-mensagem">
						<?php
							if(isset($_SESSION['updateSucesso'])){
								echo $_SESSION['updateSucesso'];
								$_SESSION['updateSucesso'] = null;								
							}
							if(isset($_SESSION['updateErro'])){
								echo $_SESSION['updateErro'];
								$_SESSION['updateErro'] = null;
							}
						?>
						</div>
					</form>
			</fieldset>
	</div>
	<div class="container-delete">		
			<fieldset>
				<legend>Deletar</legend>
					<form action="delete.php" method="post">
						<label for="id">Qual ID:</label>
						<select name="id" id="ids">
							<?php
								foreach(conectarBanco()->query('select idusuario from tb_usuarios;') as $key => $value){		
									$temp = $value['idusuario'];
									echo "<option value='$temp'>$temp</option> <br>";
								}
							?>
						</select><br>					
						<input type="submit" value="Deletar">
						<div class="campo-mensagem">
						<?php
							if(isset($_SESSION['deleteSucesso'])){
								echo $_SESSION['deleteSucesso'];
								$_SESSION['deleteSucesso'] = null;								
							}
							if(isset($_SESSION['deleteErro'])){
								echo $_SESSION['deleteErro'];
								$_SESSION['deleteErro'] = null;
							}
						?>
						</div>
					</form>
			</fieldset>
	</div>

</div>

<h1>Visualizar Registros</h1>
<div class="container container-select">
	

	<div class="container-select-content">
		<?php	
			echo "<table id='table-produtos'>";
			echo "<tr><th>ID</th><th>Código</th><th>Fornecedor</th><th>Nome</th><th>Descrição</th><th>Quantidade</th><th>Custo</th><th>Valor</th><th>Registrado</th></tr>";
			foreach(conectarBanco()->query('select * from tb_produtos;') as $key => $value){		
				
				echo "<tr><td>".$value['id_prod']."</td><td>".$value['codigo_prod']."</td><td>".$value['fornecedor_prod']."</td><td>".$value['nome_prod']."</td><td>".$value['descricao_prod']."</td><td>".$value['qtde_prod']."</td><td>".$value['custo_prod']."</td><td>".$value['valor_prod']."</td><td>".$value['data_aquisicao_prod']."</td></tr>";

			}
			echo "</table>";

		?>
	</div>
</div>

<script>

/*
function lembretes() {
  alert("01. Alterar formularios de edição.\n02. Banco pronto.\n03. Ver acentuação do resultado");
}
lembretes();
*/


</script>
</main>
</body>
</html>