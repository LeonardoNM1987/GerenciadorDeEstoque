<?php
declare(strict_types=1);
if(!isset($_SESSION)){session_start();} 

require_once "Produto.php";
require_once "config.php";


$produto->deleteRegister(intval($_POST['id']));

if($produto->getLinhasDelete()>0){
	$_SESSION['deleteSucesso'] = "Registro removido com sucesso.";
}else{
	$_SESSION['deleteErro'] = "Não foi realizada nenhuma alteração.";
}
header('Location: index.php');
















