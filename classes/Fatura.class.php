<?php
//BUSCANDO AS CLASSES
include_once "Conexao.class.php";
include_once "Funcoes.class.php";
require_once "Aluno.class.php";
//CRIANDO A CLASSE
class Fatura{
	//ATRIBUTOS
	private $con;
	private $objal;
	private $idFt;
	private $nomeFt;
    private $mes;
    private $vencFt;
    private $valorFt;
    private $referente;
    private $horarioFt;
    private $statusFt;
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
	
	public function querySelecionaFt($dado){
		try{
			$this->idFt = $this->objal->base64($dado, 2);
			$cst = $this->con->conectar()->prepare("SELECT `id`, `nome_ft`, `mes`, `venc_ft`, `valor_ft`, `horario_ft`, `referente`, `status_ft`, `data_pagamento` FROM `dot_fatura` WHERE `id` = :idFt;");
			$cst->bindParam(":idFt", $this->idFt, PDO::PARAM_INT);
			if($cst->execute()){
				return $cst->fetch();
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function querySelectFt(){
		try{
			$cst = $this->con->conectar()->prepare("SELECT `id`, `nome_ft`, `mes`, `venc_ft`, `valor_ft`, `horario_ft`, `referente`, `status_ft`, `data_pagamento` FROM `dot_fatura`");
			$cst->execute();
			return $cst->fetchAll();
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}    
    
	public function queryGerarFt(){
		try{
            $objAlunoFt = new Aluno();
            
            foreach($objAlunoFt->querySelectAlu() as $rst){
                $this->nomeFt = $rst['nome'];
                $this->mes = date("Y/m");
                $this->vencFt = $rst['data_venc'];
                $vencimentoMesCompleto = $this->mes . "/" . $this->vencFt;  
                
                $horarios = explode(",",$rst['horario']);
                foreach ($horarios as $indice => $valor) {
                    if($valor == "15:00hr"){
                        if(($rst['status'] == "ativo") && ($rst['bjj'] == "sim")){
                            $this->valorFt = $rst['valor_Bjj'];
                            $this->referente = "Jiu-Jitsu";
                            $this->horarioFt = $valor;
                            
                            //Inserindo os dados da fatura
                            $cst = $this->con->conectar()->prepare("INSERT INTO `dot_fatura` (`nome_ft`, `mes`, `venc_ft`, `valor_ft`, `horario_ft`, `referente`) VALUES (:nomeFt, :mes, :vencFt, :valorFt, :horarioFt, :referente);");
                            $cst->bindParam(":nomeFt", $this->nomeFt, PDO::PARAM_STR);
                            $cst->bindParam(":mes", $vencimentoMesCompleto, PDO::PARAM_STR);
                            $cst->bindParam(":vencFt", $this->vencFt, PDO::PARAM_STR);
                            $cst->bindParam(":valorFt", $this->valorFt, PDO::PARAM_STR);
                            $cst->bindParam(":horarioFt", $this->horarioFt, PDO::PARAM_STR);
                            $cst->bindParam(":referente", $this->referente, PDO::PARAM_STR);

                            if($cst->execute()){
                                //return 'ok';
                            }else{
                                return 'Error';
                            }
                        }
                    }
                    if($valor == "19:30hr"){
                        if(($rst['status'] == "ativo") && ($rst['bjj'] == "sim")){
                            $this->valorFt = $rst['valor_Bjj'];
                            $this->referente = "Jiu-Jitsu";
                            $this->horarioFt = $valor;
                            
                            //Inserindo os dados da fatura
                            $cst = $this->con->conectar()->prepare("INSERT INTO `dot_fatura` (`nome_ft`, `mes`, `venc_ft`, `valor_ft`, `horario_ft`, `referente`) VALUES (:nomeFt, :mes, :vencFt, :valorFt, :horarioFt, :referente);");
                            $cst->bindParam(":nomeFt", $this->nomeFt, PDO::PARAM_STR);
                            $cst->bindParam(":mes", $vencimentoMesCompleto, PDO::PARAM_STR);
                            $cst->bindParam(":vencFt", $this->vencFt, PDO::PARAM_STR);
                            $cst->bindParam(":valorFt", $this->valorFt, PDO::PARAM_STR);
                            $cst->bindParam(":horarioFt", $this->horarioFt, PDO::PARAM_STR);
                            $cst->bindParam(":referente", $this->referente, PDO::PARAM_STR);

                            if($cst->execute()){
                                //return 'ok';
                            }else{
                                return 'Error';
                            }
                        }
                    }
                    if($valor == "08:00hr"){
                        if(($rst['status'] == "ativo") && ($rst['muay_thai'] == "sim")){
                            $this->valorFt = $rst['valor_MT'];
                            $this->referente = "Muay Thai";
                            $this->horarioFt = $valor;
                            
                            //Inserindo os dados da fatura
                            $cst = $this->con->conectar()->prepare("INSERT INTO `dot_fatura` (`nome_ft`, `mes`, `venc_ft`, `valor_ft`, `horario_ft`, `referente`) VALUES (:nomeFt, :mes, :vencFt, :valorFt, :horarioFt, :referente);");
                            $cst->bindParam(":nomeFt", $this->nomeFt, PDO::PARAM_STR);
                            $cst->bindParam(":mes", $vencimentoMesCompleto, PDO::PARAM_STR);
                            $cst->bindParam(":vencFt", $this->vencFt, PDO::PARAM_STR);
                            $cst->bindParam(":valorFt", $this->valorFt, PDO::PARAM_STR);
                            $cst->bindParam(":horarioFt", $this->horarioFt, PDO::PARAM_STR);
                            $cst->bindParam(":referente", $this->referente, PDO::PARAM_STR);

                            if($cst->execute()){
                                //return 'ok';
                            }else{
                                return 'Error';
                            }
                        }    
                    }
                    if($valor == "10:00hr"){
                        if(($rst['status'] == "ativo") && ($rst['muay_thai'] == "sim")){
                            $this->valorFt = $rst['valor_MT'];
                            $this->referente = "Muay Thai";
                            $this->horarioFt = $valor;
                            
                            //Inserindo os dados da fatura
                            $cst = $this->con->conectar()->prepare("INSERT INTO `dot_fatura` (`nome_ft`, `mes`, `venc_ft`, `valor_ft`, `horario_ft`, `referente`) VALUES (:nomeFt, :mes, :vencFt, :valorFt, :horarioFt, :referente);");
                            $cst->bindParam(":nomeFt", $this->nomeFt, PDO::PARAM_STR);
                            $cst->bindParam(":mes", $vencimentoMesCompleto, PDO::PARAM_STR);
                            $cst->bindParam(":vencFt", $this->vencFt, PDO::PARAM_STR);
                            $cst->bindParam(":valorFt", $this->valorFt, PDO::PARAM_STR);
                            $cst->bindParam(":horarioFt", $this->horarioFt, PDO::PARAM_STR);
                            $cst->bindParam(":referente", $this->referente, PDO::PARAM_STR);

                            if($cst->execute()){
                                //return 'ok';
                            }else{
                                return 'Error';
                            }
                        }    
                    }    
                    if($valor == "16:00hr"){
                        if(($rst['status'] == "ativo") && ($rst['muay_thai'] == "sim")){
                            $this->valorFt = $rst['valor_MT'];
                            $this->referente = "Muay Thai";
                            $this->horarioFt = $valor;
                            
                            //Inserindo os dados da fatura
                            $cst = $this->con->conectar()->prepare("INSERT INTO `dot_fatura` (`nome_ft`, `mes`, `venc_ft`, `valor_ft`, `horario_ft`, `referente`) VALUES (:nomeFt, :mes, :vencFt, :valorFt, :horarioFt, :referente);");
                            $cst->bindParam(":nomeFt", $this->nomeFt, PDO::PARAM_STR);
                            $cst->bindParam(":mes", $vencimentoMesCompleto, PDO::PARAM_STR);
                            $cst->bindParam(":vencFt", $this->vencFt, PDO::PARAM_STR);
                            $cst->bindParam(":valorFt", $this->valorFt, PDO::PARAM_STR);
                            $cst->bindParam(":horarioFt", $this->horarioFt, PDO::PARAM_STR);
                            $cst->bindParam(":referente", $this->referente, PDO::PARAM_STR);

                            if($cst->execute()){
                                //return 'ok';
                            }else{
                                return 'Error';
                            }
                        }  
                    }   
                    if($valor == "17:00hr"){
                        if(($rst['status'] == "ativo") && ($rst['muay_thai'] == "sim")){
                            $this->valorFt = $rst['valor_MT'];
                            $this->referente = "Muay Thai";
                            $this->horarioFt = $valor;
                            
                            //Inserindo os dados da fatura
                            $cst = $this->con->conectar()->prepare("INSERT INTO `dot_fatura` (`nome_ft`, `mes`, `venc_ft`, `valor_ft`, `horario_ft`, `referente`) VALUES (:nomeFt, :mes, :vencFt, :valorFt, :horarioFt, :referente);");
                            $cst->bindParam(":nomeFt", $this->nomeFt, PDO::PARAM_STR);
                            $cst->bindParam(":mes", $vencimentoMesCompleto, PDO::PARAM_STR);
                            $cst->bindParam(":vencFt", $this->vencFt, PDO::PARAM_STR);
                            $cst->bindParam(":valorFt", $this->valorFt, PDO::PARAM_STR);
                            $cst->bindParam(":horarioFt", $this->horarioFt, PDO::PARAM_STR);
                            $cst->bindParam(":referente", $this->referente, PDO::PARAM_STR);

                            if($cst->execute()){
                                //return 'ok';
                            }else{
                                return 'Error';
                            }
                        }
                    }
                    if($valor == "18:30hr"){
                        if(($rst['status'] == "ativo") && ($rst['muay_thai'] == "sim")){
                            $this->valorFt = $rst['valor_MT'];
                            $this->referente = "Muay Thai";
                            $this->horarioFt = $valor;
                            
                            //Inserindo os dados da fatura
                            $cst = $this->con->conectar()->prepare("INSERT INTO `dot_fatura` (`nome_ft`, `mes`, `venc_ft`, `valor_ft`, `horario_ft`, `referente`) VALUES (:nomeFt, :mes, :vencFt, :valorFt, :horarioFt, :referente);");
                            $cst->bindParam(":nomeFt", $this->nomeFt, PDO::PARAM_STR);
                            $cst->bindParam(":mes", $vencimentoMesCompleto, PDO::PARAM_STR);
                            $cst->bindParam(":vencFt", $this->vencFt, PDO::PARAM_STR);
                            $cst->bindParam(":valorFt", $this->valorFt, PDO::PARAM_STR);
                            $cst->bindParam(":horarioFt", $this->horarioFt, PDO::PARAM_STR);
                            $cst->bindParam(":referente", $this->referente, PDO::PARAM_STR);

                            if($cst->execute()){
                                //return 'ok';
                            }else{
                                return 'Error';
                            }
                        }
                    }
                    if($valor == "20:30hr"){
                        if(($rst['status'] == "ativo") && ($rst['muay_thai'] == "sim")){
                            $this->valorFt = $rst['valor_MT'];
                            $this->referente = "Muay Thai";
                            $this->horarioFt = $valor;
                            
                            //Inserindo os dados da fatura
                            $cst = $this->con->conectar()->prepare("INSERT INTO `dot_fatura` (`nome_ft`, `mes`, `venc_ft`, `valor_ft`, `horario_ft`, `referente`) VALUES (:nomeFt, :mes, :vencFt, :valorFt, :horarioFt, :referente);");
                            $cst->bindParam(":nomeFt", $this->nomeFt, PDO::PARAM_STR);
                            $cst->bindParam(":mes", $vencimentoMesCompleto, PDO::PARAM_STR);
                            $cst->bindParam(":vencFt", $this->vencFt, PDO::PARAM_STR);
                            $cst->bindParam(":valorFt", $this->valorFt, PDO::PARAM_STR);
                            $cst->bindParam(":horarioFt", $this->horarioFt, PDO::PARAM_STR);
                            $cst->bindParam(":referente", $this->referente, PDO::PARAM_STR);

                            if($cst->execute()){
                                //return 'ok';
                            }else{
                                return 'Error';
                            }
                        }    
                    }
                }
	
            }
        }catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
    }
    
	
	public function queryUpdadeFt($dados){
		try{
			$this->idFt = $this->objal->base64($dados['func'], 2);
			$this->statusFt = $dados['status'];
            $dtPagamento = date ('Y-m-d');
            
            //Inserindo os dados
            $cst = $this->con->conectar()->prepare("UPDATE `dot_fatura` SET `status_ft` = :statusft, `data_pagamento` = :dtPagamento WHERE `id` = :idFt;");
            $cst->bindParam(":idFt", $this->idFt, PDO::PARAM_INT);
            $cst->bindParam(":statusft", $this->statusFt, PDO::PARAM_STR);
            $cst->bindParam(":dtPagamento", $dtPagamento, PDO::PARAM_STR);
			
            if($cst->execute()){
                return 'ok';
            }else{
                return 'Error ao alterar';
            }
               
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function queryDeleteFt($dado){
		try{
			$this->idFt = $this->objal->base64($dado, 2);
			$cst = $this->con->conectar()->prepare("DELETE FROM `dot_fatura` WHERE `id` = :idFunc;");
			$cst->bindParam(":idFunc", $this->idFt, PDO::PARAM_INT);
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