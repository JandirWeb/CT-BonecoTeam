<?php
//BUSCANDO AS CLASSES
include_once "Conexao.class.php";
include_once "Funcoes.class.php";
//CRIANDO A CLASSE
class Aluno{
	//ATRIBUTOS
	private $con;
	private $objal;
	private $idAlu;
	private $nome;
	private $rg;
	private $dtNasc;
	private $ende;
    private $fone;
    private $email;
    private $dtCad;
    private $muayThai;
    private $bjj;
    private $horario;
    private $status;
    private $dtVenc;
    private $img;
    private $valorMT;
    private $valorBjj;
	//CONSTRUTOR
	public function __construct(){
		$this->con = new Conexao();
		$this->objal = new Funcoes();
	}
	//METODOS MAGICO
	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}
	//METODOS
	
	public function querySelecionaAlu($dado){
		try{
			$this->idAlu = $this->objal->base64($dado, 2);
			$cst = $this->con->conectar()->prepare("SELECT `id`, `nome`, `rg`, `data_nasc`, `end`, `fone`, `mail`, `data_cad`, `muay_thai`, `bjj`, `horario`, `status`, `data_venc`, `thumb`, `valor_MT`, `valor_Bjj` FROM `dot_aluno` WHERE `id` = :idFunc;");
			$cst->bindParam(":idFunc", $this->idAlu, PDO::PARAM_INT);
			if($cst->execute()){
				return $cst->fetch();
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function querySelectAlu(){
		try{
			$cst = $this->con->conectar()->prepare("SELECT `id`, `nome`, `rg`, `data_nasc`, `end`, `fone`, `mail`, `data_cad`, `muay_thai`, `bjj`, `horario`, `status`, `data_venc`, `thumb`, `valor_MT`, `valor_Bjj` FROM `dot_aluno`");
			$cst->execute();
			return $cst->fetchAll();
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}    
    
	public function queryInsertAlu($dados){
		try{            
			$this->nome = $this->objal->tratarCaracter($dados['nome'], 1);
            $this->rg = $this->objal->tratarCaracter($dados['rg'], 1);
            $this->dtNasc = $this->objal->tratarCaracter($dados['data_nasc'], 1);
            $this->ende = $this->objal->tratarCaracter($dados['end'], 1);
			$this->fone = $this->objal->tratarCaracter($dados['fone'], 1);
            $this->email = $this->objal->tratarCaracter($dados['email'], 1);
            $this->dtCad = $this->objal->tratarCaracter($dados['data_cad'], 1);
            $this->muayThai = $this->objal->tratarCaracter($dados['muay_thai'], 1);
            $this->bjj = $this->objal->tratarCaracter($dados['bjj'], 1);
            $this->valorMT = $this->objal->tratarCaracter($dados['valorMT'], 1);
            $this->valorBjj = $this->objal->tratarCaracter($dados['valorBjj'], 1);
            $img = $_FILES['thumb'];
            
            foreach ($dados['horario'] as $campo => $valor) { 
                $$campo = $valor;
                $horas .= $valor;
            }

            $this->dtVenc = $this->objal->tratarCaracter($dados['data_venc'], 1);
            $this->status = $this->objal->tratarCaracter($dados['status'], 1);
            
            //Tratando upload de imagem
            $pasta = "../uploads";
            $permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');

            require("funcao_upload.php");
	        $name = $img['name'];
		    $tmp = $img['tmp_name'];
		    $type = $img['type'];
		 
		    $entrada = trim("$ano");
		    if(strstr($entrada, "/")){
                $aux = explode("/", $entrada);
                $aux2 = date('H:i:s');
                $aux3 = $aux[2] . "-" . $aux[1] . "-" . $aux[0] . " " . $aux2;    
            }
		 
            if(!empty($name) && in_array($type, $permitido)){
                $name = md5(uniqid(rand(), true)).".jpg";
                Redimensionar($tmp, $name, 500, $pasta);
            }
            
            //Inserindo os dados
			$cst = $this->con->conectar()->prepare("INSERT INTO `dot_aluno` (`nome`, `rg`, `data_nasc`, `end`, `fone`, `mail`, `data_cad`, `thumb`, `muay_thai`, `bjj`, `data_venc`, `horario`, `status`, `valor_MT`, `valor_Bjj`) VALUES (:nome, :rg, :data_nasc, :end, :fone, :mail, :data_cad, :thumb, :muay_thai, :bjj, :data_venc, :horario, :status, :valorMT, :valorBjj);");
			$cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst->bindParam(":rg", $this->rg, PDO::PARAM_STR);
            $cst->bindParam(":data_nasc", $this->dtNasc, PDO::PARAM_STR);
			$cst->bindParam(":end", $this->ende, PDO::PARAM_STR);
            $cst->bindParam(":fone", $this->fone, PDO::PARAM_STR);
            $cst->bindParam(":mail", $this->email, PDO::PARAM_STR);
            $cst->bindParam(":data_cad", $this->dtCad, PDO::PARAM_STR);
            $cst->bindParam(":muay_thai", $this->muayThai, PDO::PARAM_STR);
            $cst->bindParam(":bjj", $this->bjj, PDO::PARAM_STR);
            $cst->bindParam(":data_venc", $this->dtVenc, PDO::PARAM_STR);
            $cst->bindParam(":horario", $horas, PDO::PARAM_STR);
            $cst->bindParam(":thumb", $name, PDO::PARAM_STR);
            $cst->bindParam(":status", $this->status, PDO::PARAM_STR);
            $cst->bindParam(":valorMT", $this->valorMT, PDO::PARAM_STR);
            $cst->bindParam(":valorBjj", $this->valorBjj, PDO::PARAM_STR);
			if($cst->execute()){
				return 'ok';
			}else{
				return 'Error ao cadastrar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
    
	
	public function queryUpdadeAlu($dados){
		try{
			$this->idAlu = $this->objal->base64($dados['func'], 2);
			$this->nome = $dados['nome'];
			$this->rg = $dados['rg'];
            $this->dtNasc = $dados['data_nasc'];
            $this->ende = $dados['end'];
            $this->fone = $dados['fone'];
            $this->email = $dados['email'];
            $this->muayThai = $dados['muay_thai'];
            $this->bjj = $dados['bjj'];
            $this->status = $dados['status'];
            $this->valorMT = $dados['valorMT'];
            $this->valorBjj = $dados['valorBjj'];
            
            foreach ($dados['horario'] as $campo => $valor) { 
                $$campo = $valor;
                $variavel .= $valor;
            }

            $this->dtVenc = $dados['data_venc'];
            
            //Inserindo os dados
            $cst = $this->con->conectar()->prepare("UPDATE `dot_aluno` SET `nome` = :nome, `rg` = :rg, `data_nasc` = :data_nasc, `end` = :end, `fone` = :fone, `mail` = :mail, `muay_thai` = :muay_thai, `bjj` = :bjj, `horario` = :horario, `data_venc` = :data_venc, `status` = :status, `valor_MT` = :valorMT, `valor_Bjj` = :valorBjj WHERE `id` = :idFunc;");
            $cst->bindParam(":idFunc", $this->idAlu, PDO::PARAM_INT);
            $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst->bindParam(":rg", $this->rg, PDO::PARAM_STR);
            $cst->bindParam(":data_nasc", $this->dtNasc, PDO::PARAM_STR);
            $cst->bindParam(":end", $this->ende, PDO::PARAM_STR);
            $cst->bindParam(":fone", $this->fone, PDO::PARAM_STR);
            $cst->bindParam(":mail", $this->email, PDO::PARAM_STR);
            $cst->bindParam(":muay_thai", $this->muayThai, PDO::PARAM_STR);
            $cst->bindParam(":bjj", $this->bjj, PDO::PARAM_STR);
            $cst->bindParam(":horario", $variavel, PDO::PARAM_STR);
            $cst->bindParam(":data_venc", $this->dtVenc, PDO::PARAM_STR);
            $cst->bindParam(":status", $this->status, PDO::PARAM_STR);
            $cst->bindParam(":valorMT", $this->valorMT, PDO::PARAM_STR);
            $cst->bindParam(":valorBjj", $this->valorBjj, PDO::PARAM_STR);
            
			
            if($cst->execute()){
                return 'ok';
            }else{
                return 'Error ao alterar';
            }
               
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
    
    //UPDATE IMAGEM
    public function queryUpdadeImg($dados){
		try{
			$this->idAlu = $this->objal->base64($dados['func'], 2);
            $img = $_FILES['thumb'];
            
            //Tratando upload de imagem
            $pasta = "../uploads";
            $permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');

            require("funcao_upload.php");
	        $name = $img['name'];
		    $tmp = $img['tmp_name'];
		    $type = $img['type'];
		 
		    $entrada = trim("$ano");
		    if(strstr($entrada, "/")){
                $aux = explode("/", $entrada);
                $aux2 = date('H:i:s');
                $aux3 = $aux[2] . "-" . $aux[1] . "-" . $aux[0] . " " . $aux2;    
            }
		 
            if(!empty($name) && in_array($type, $permitido)){
                $name = md5(uniqid(rand(), true)).".jpg";
                Redimensionar($tmp, $name, 500, $pasta);
            }
            
            //Inserindo os dados
            $cst = $this->con->conectar()->prepare("UPDATE `dot_aluno` SET `thumb` = :thumb WHERE `id` = :idFunc;");
            $cst->bindParam(":idFunc", $this->idAlu, PDO::PARAM_INT);
            $cst->bindParam(":thumb", $name, PDO::PARAM_STR);
			
            if($cst->execute()){
                return 'ok';
            }else{
                return 'Error ao alterar';
            }
               
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function queryDeleteAlu($dado){
		try{
			$this->idAlu = $this->objal->base64($dado, 2);
			$cst = $this->con->conectar()->prepare("DELETE FROM `dot_aluno` WHERE `id` = :idFunc;");
			$cst->bindParam(":idFunc", $this->idAlu, PDO::PARAM_INT);
			if($cst->execute()){
				return 'ok';
			}else{
				return 'Erro ao deletar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
}
    
?>