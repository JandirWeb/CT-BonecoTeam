<?php
//BUSCANDO AS CLASSES
include_once "Conexao.class.php";
include_once "Funcoes.class.php";
//CRIANDO A CLASSE
class Fatura{
	//ATRIBUTOS
	private $con;
	private $objHistorico;
	private $idHistorico;
	private $dataLiquid;
    private $totalLiquid;
    private $ctLiquid;
    private $bjjLiquid;
    private $pititoLiquid;
    private $boicaLiquid;
	//CONSTRUTOR
	public function __construct(){
		$this->con = new Conexao();
		$this->objHistorico = new Funcoes();
	}
	//METODOS MAGICO
	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}
	//METODOS
	public function querySelecionaHistorico($dado){
		try{
			$this->idHistorico = $this->objHistorico->base64($dado, 2);
			$cst = $this->con->conectar()->prepare("SELECT `id`, `data_liquid`, `total_liquid`, `CT_liquid`, `bjj_liquid`, `pitito_liquid`, `boica_liquid` FROM `dot_historico_pag` WHERE `id` = :idHistorico;");
			$cst->bindParam(":idHistorico", $this->idHistorico, PDO::PARAM_INT);
			if($cst->execute()){
				return $cst->fetch();
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function querySelectHitorico(){
		try{
			$cst = $this->con->conectar()->prepare("SELECT `id`, `data_liquid`, `total_liquid`, `CT_liquid`, `bjj_liquid`, `pitito_liquid`, `boica_liquid` FROM `dot_historico_pag`");
			$cst->execute();
			return $cst->fetchAll();
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}    
    
	public function queryRegistraHistorico($totalL, $ctL, $bjjL, $pititoL, $boicaL){
		try{
            $this->dataLiquid = date ("Y-m-d");
            $this->totalLiquid = $totalL;
            $this->ctLiquid = $ctL;
            $this->bjjLiquid = $bjjL;
            $this->pititoLiquid = $pititoL;
            $this->boicaLiquid = boicaL;
            
            //Inserindo os dados
			$cst = $this->con->conectar()->prepare("INSERT INTO `dot_historico_pag` (`data_liquid`, `total_liquid`, `ct_liquid`, `bjj_liquid`, `pitito_liquid`, `boica_liquid`) VALUES (:data, :totalL, :ctL, :bjjL, :pititoL, :boicaL);");
			$cst->bindParam(":data", $this->dataLiquid, PDO::PARAM_STR);
            $cst->bindParam(":totalL", $this->totalLiquid, PDO::PARAM_STR);
            $cst->bindParam(":ctL", $this->ctLiquid, PDO::PARAM_STR);
			$cst->bindParam(":bjjL", $this->bjjLiquid, PDO::PARAM_STR);
            $cst->bindParam(":pititoL", $this->pititoLiquid, PDO::PARAM_STR);
            $cst->bindParam(":boicaL", $this->boicaLiquid, PDO::PARAM_STR);
			if($cst->execute()){
				return 'ok';
			}else{
				return 'Error ao cadastrar';
			}
            
        }catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
    }
    
	
	public function queryDeleteHistorico($dado){
		try{
			$this->idHistorico = $this->objHistorico->base64($dado, 2);
			$cst = $this->con->conectar()->prepare("DELETE FROM `dot_historico_pag` WHERE `id` = :idFunc;");
			$cst->bindParam(":idFunc", $this->idHistorico, PDO::PARAM_INT);
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