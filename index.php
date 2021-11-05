<?php 
	declare(strict_types=1);	
	//require_once "connect.php";
	require_once "Produto.php";
	require_once "config.php";
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

<?php
	
	
?>



<h1>Manipulação dos Registros</h1>
<div class="container main-crud">
	
		
	
		<div class="container-insert">
			
			<fieldset>
				<legend>Cadastrar Produto</legend>
					<form action="insert.php" method="post" id="insertForm">
										
						<p><label for="codigo_prod">Código:</label><input type="text" name="codigo_prod" required></p>
						<p><label for="fornecedor_prod">Fornecedor:</label><input type="text" name="fornecedor_prod" required></p>
						<p><label for="nome_prod">Nome do Produto:</label><input type="text" name="nome_prod" required></p>
						<p><label for="descricao_prod">Descrição:</label><input type="text" name="descricao_prod"></p>
						<p><label for="qtde_prod">Quantidade:</label><input type="number" name="qtde_prod"></p>
						<p><label for="custo_prod">Valor de Custo:</label><input type="" name="custo_prod"></p>
						<p><label for="valor_prod">Valor de Venda:</label><input type="text" name="valor_prod"></p>
						<p><input class="button-form" type="submit" value="Inserir">
						<input class="button-form" type="button" onclick="resetInsert()" value="Limpar"></p>
						<div class="campo-mensagem">						
							<?php
							
								if(isset($_SESSION['insertSucesso'])){
									echo $_SESSION['insertSucesso'];
									$_SESSION['insertSucesso'] = null;								
								}
								if(isset($_SESSION['insertErro'])){
									echo $_SESSION['insertErro'];
									$_SESSION['insertErro'] = null;
								}
								
							?>
						</div>
					</form>
			</fieldset>
		</div>
		<div class="container-update">		
			<fieldset>
				<legend>Alterar um Produto</legend>
					<form action="update.php" method="post" id="updateForm">
						<p>
							<label for="id">Selecione o ID:</label>
							<select name="id" id="ids">						
								<?php							
									foreach($produto->listRegister() as $key => $value){
											$temp = $value['id_prod'];
											echo "<option value='$temp'>$temp</option> <br>";
										}  
								?>
							</select>
						</p>
						
						<p><label for="codigo_prod">Código:</label><input type="text" name="codigo_prod" required></p>
						<p><label for="fornecedor_prod">Fornecedor:</label><input type="text" name="fornecedor_prod" required></p>
						<p><label for="nome_prod">Nome do Produto:</label><input type="text" name="nome_prod" required></p>
						<p><label for="descricao_prod">Descrição:</label><input type="text" name="descricao_prod"></p>
						<p><label for="qtde_prod">Quantidade:</label><input type="number" name="qtde_prod"></p>
						<p><label for="custo_prod">Valor de Custo:</label><input type="" name="custo_prod"></p>
						<p><label for="valor_prod">Valor de Venda:</label><input type="text" name="valor_prod"></p>
						<p><input class="button-form" type="submit" value="Atualizar"><input class="button-form" type="button" onclick="resetUpdate()" value="Limpar"></p>
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
					<legend>Deletar Produto</legend>
						<form action="delete.php" method="post">
							<label for="id">Selecione o ID:</label>
							<select name="id" id="ids">
								<?php
									foreach($produto->listRegister() as $key => $value){		
										$temp = $value['id_prod'];
										echo "<option value='$temp'>$temp</option> <br>";
									}
								?>
							</select>					
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



<div class="container container-select">
<h1>Produtos</h1>
	

	<div class="container-select-content">
		<?php	
		echo "<table id='table-produtos'>";
		echo "<tr><th>ID</th><th>Código</th><th>Fornecedor</th><th>Nome</th><th>Descrição</th><th>Quantidade</th><th>Custo</th><th>Valor</th><th>Registrado</th></tr>";
		foreach($produto->listRegister() as $key => $value){		
					
			echo "<tr><td>".$value['id_prod']."</td><td>".$value['codigo_prod']."</td><td>".$value['fornecedor_prod']."</td><td>".$value['nome_prod']."</td><td>".$value['descricao_prod']."</td><td>".$value['qtde_prod']."</td><td>R$".$value['custo_prod']."</td><td>R$".$value['valor_prod']."</td><td>".$value['data_aquisicao_prod']."</td></tr>";
	
		}
		echo "</table>";
		?>
	</div>
</div>


<div class="container">
	<h1>Ajustes</h1>

	<ul>
	<li>1. Preencher campos automaticamente quando selecionar o ID, na alteração de produtos.</li>
	<li>2. Colocar casas decimais nos valores da exibição dos produtos.</li>
	<li>3. Criar forma de deletar o produto selecionando ele via checkbox.</li>
	<li>4. Criar forma de alterar o produto selecionando ele via checkbox.</li>
	</ul>

</div>







<script>
function resetInsert() {
  document.getElementById("insertForm").reset();
}
function resetUpdate() {
  document.getElementById("updateForm").reset();
}

</script>

		

</main>
</body>
</html>