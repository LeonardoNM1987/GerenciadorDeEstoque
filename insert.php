<?php
declare(strict_types=1);
if(!isset($_SESSION)){session_start();} 

require_once "Produto.php";
require_once "config.php";


$produto->insertRegister(
	$_POST['codigo_prod'],
	$_POST['fornecedor_prod'],
	$_POST['nome_prod'],
	$_POST['descricao_prod'],
	intval($_POST['qtde_prod']),
	floatval($_POST['custo_prod']),
	floatval($_POST['valor_prod'])
);

if($produto->getLinhasInsert()>0){
	$_SESSION['insertSucesso'] = "Registro inserido com sucesso.";
}else{
	$_SESSION['insertErro'] = "Não foi realizada nenhuma alteração.";
}
header('Location: index.php');


