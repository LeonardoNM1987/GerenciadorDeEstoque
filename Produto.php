<?php
declare(strict_types=1);
if(!isset($_SESSION)){session_start();} 

require_once "config.php";

class Produto{


		/*
		 * @var PDO
		*/

	private $conexao;
	private $tipoBanco;
	private $host;
	private $database;
	private $user;
	private $password;	
	private $linhasInsert;
	private $linhasDelete;
	private $linhasUpdate;


	public function __construct(string $banco, string $host, string $database, string $user, string $password)
	{
		$this->tipoBanco = $banco;
		$this->host = $host;
		$this->database = $database;
		$this->user = $user;
		$this->password = $password;
		try{
			$this->conexao = new PDO($this->tipoBanco.":host=".$this->host.";dbname=".$this->database, $this->user, $this->password);
		}catch(Exception $e){
			echo "<b>Erro de conexão: ".$e->getMessage()."</b>";				
			exit();	
		}finally{
			return $this->conexao;			
		}	
	}

	public function setDadosConexao(string $banco, string $host, string $database, string $user, ):void{
		$this->tipoBanco = $banco;
	}


	public function getLinhasInsert():int{
		return $this->linhasInsert;
	}
	public function setLinhasInsert(int $linhas):void{
		$this->linhasInsert = $linhas;
	}

	public function getLinhasDelete():int{
		return $this->linhasDelete;
	}
	public function setLinhasDelete(int $linhas):void{
		$this->linhasDelete = $linhas;
	}

	public function getLinhasUpdate():int{
		return $this->linhasUpdate;
	}
	public function setLinhasUpdate(int $linhas):void{
		$this->linhasUpdate = $linhas;
	}

	public function listRegister(){
		$sql = $this->conexao->query('SELECT * FROM tb_produtos;');
		return $sql;
	}

	public function insertRegister(string $co, string $fo, string $n, string $des, int $qt, float $cus, float $val):void{		
		$sql = 'INSERT INTO tb_produtos(codigo_prod, fornecedor_prod, nome_prod, descricao_prod, qtde_prod, custo_prod, valor_prod) VALUES(?,?,?,?,?,?,?)';
		$stm = $this->conexao->prepare($sql);		
		$stm->bindParam(1, $co);
		$stm->bindParam(2, $fo);
		$stm->bindParam(3, $n);
		$stm->bindParam(4, $des);
		$stm->bindParam(5, $qt);
		$stm->bindParam(6, $cus);
		$stm->bindParam(7, $val);		
		$stm->execute();
		$this->setLinhasInsert($stm->rowCount());		
	}

	public function deleteRegister(int $id):void{
		$sql = 'DELETE FROM tb_produtos WHERE id_prod=?';
		$stm = $this->conexao->prepare($sql);		
		$stm->bindParam(1, $id);
		$stm->execute();
		$this->setLinhasDelete($stm->rowCount());
	}

	public function updateRegister(string $co, string $fo, string $n, string $des, int $qt, float $cus, float $val, int $id):void{
		$sql = 'UPDATE tb_produtos SET codigo_prod = ? , fornecedor_prod = ?, nome_prod = ?, descricao_prod =?, qtde_prod = ?, custo_prod =?, valor_prod =? where id_prod=?';
		$stm = $this->conexao->prepare($sql);		
		$stm->bindParam(1, $co);
		$stm->bindParam(2, $fo);
		$stm->bindParam(3, $n);
		$stm->bindParam(4, $des);
		$stm->bindParam(5, $qt);
		$stm->bindParam(6, $cus);
		$stm->bindParam(7, $val);
		$stm->bindParam(8, $id);		
		$stm->execute();
		$this->setLinhasUpdate($stm->rowCount());
	}



}