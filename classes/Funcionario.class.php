<?php
//BUSCANDO AS CLASSES
include_once "Conexao.class.php";
include_once "Funcoes.class.php";
//CRIANDO A CLASSE
class Funcionario{
	//ATRIBUTOS
	private $con;
	private $objfc;
	private $idUser;
	private $usuario;
	private $senha;
	private $nivel;
	private $nome;
    private $email;
	//CONSTRUTOR
	public function __construct(){
		$this->con = new Conexao();
		$this->objfc = new Funcoes();
	}
	//METODOS MAGICO
	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}
	//METODOS
	
	public function querySeleciona($dado){
		try{
			$this->idUser = $this->objfc->base64($dado, 2);
			$cst = $this->con->conectar()->prepare("SELECT `id`, `usuario`, `senha`, `nivel`, `nome`, `email` FROM `dot_users` WHERE `id` = :idFunc;");
			$cst->bindParam(":idFunc", $this->idUser, PDO::PARAM_INT);
			if($cst->execute()){
				return $cst->fetch();
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function querySelect(){
		try{
			$cst = $this->con->conectar()->prepare("SELECT `id`, `usuario`, `nivel`, `nome`, `email` FROM `dot_users`");
			$cst->execute();
			return $cst->fetchAll();
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function queryInsert($dados){
		try{
			$this->usuario = $this->objfc->tratarCaracter($dados['usuario'], 1);
            $this->senha = sha1($dados['senha']);
			$this->nome = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->email = $this->objfc->tratarCaracter($dados['email'], 1);
			$cst = $this->con->conectar()->prepare("INSERT INTO `dot_users` (`usuario`, `senha`, `nome`, `email`) VALUES (:usuario, :senha, :nome, :email);");
			$cst->bindParam(":usuario", $this->usuario, PDO::PARAM_STR);
            $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
			$cst->bindParam(":email", $this->email, PDO::PARAM_STR);
			if($cst->execute()){
				return 'ok';
			}else{
				return 'Error ao cadastrar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function queryUpdade($dados){
		try{
			$this->idUser = $this->objfc->base64($dados['func'], 2);
			$this->usuario = $dados['usuario'];
			$this->email = $dados['email'];
            $this->senha = sha1($dados['senha']);
            $this->nome = $dados['nome'];
            
            $cst = $this->con->conectar()->prepare("UPDATE `dot_users` SET `usuario` = :usuario, `senha` = :senha, `nome` = :nome, `email` = :email WHERE `id` = :idFunc;");
            $cst->bindParam(":idFunc", $this->idUser, PDO::PARAM_INT);
            $cst->bindParam(":usuario", $this->usuario, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
            $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
			
            if($cst->execute()){
                return 'ok';
            }else{
                return 'Error ao alterar';
            }
               
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function queryDelete($dado){
		try{
			$this->idUser = $this->objfc->base64($dado, 2);
			$cst = $this->con->conectar()->prepare("DELETE FROM `dot_users` WHERE `id` = :idFunc;");
			$cst->bindParam(":idFunc", $this->idUser, PDO::PARAM_INT);
			if($cst->execute()){
				return 'ok';
			}else{
				return 'Erro ao deletar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function logaFuncionario($dados){
		$this->usuario = $dados['usuario'];
		$this->senha = sha1($dados['senha']);
		try{
			$cst = $this->con->conectar()->prepare("SELECT `id`, `usuario`, `senha` FROM `dot_users` WHERE `usuario` = :usuario AND `senha` = :senha;");
			$cst->bindParam(':usuario', $this->usuario, PDO::PARAM_STR);
			$cst->bindParam(':senha', $this->senha, PDO::PARAM_STR);
			$cst->execute();
			if($cst->rowCount() == 0){
				header('location: ?login=error');
			}else{
				session_start();
				$rst = $cst->fetch();
				$_SESSION['logado'] = "sim";
				$_SESSION['func'] = $rst['idUser'];
				header("location: admin");
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMassage();
		}
	}
	
	public function funcionarioLogado($dado){
		$cst = $this->con->conectar()->prepare("SELECT `id`, `nome`, `email` FROM `dot_users` WHERE `id` = :idFunc;");
		$cst->bindParam(':idFunc', $dado, PDO::PARAM_INT);
		$cst->execute();
		$rst = $cst->fetch();
		$_SESSION['nome'] = $rst['nome'];
	}
	
	public function sairFuncionario(){
		session_destroy();
		header ('location: http://localhost/admctboneco/index.php');
	}
	
}
?>
