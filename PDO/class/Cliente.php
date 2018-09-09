<?php

class Cliente {

	private $idcliente;
	private $nomecliente;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdcliente(){
		return $this->idcliente;
	}
	public function setIdcliente($value){
		$this->idcliente = $value;
	}

	public function getNomecliente(){
		return $this->nomecliente;
	}
	public function setNomecliente($value){
		$this->nomecliente = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}
	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}
	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public function loadById($id){
		$sql = new Sql();

		$result = $sql->select("SELECT * from tb_clientes WHERE id_cliente = :ID", array(
			":ID"=>$id
		));

		//Verifica se a consulta possui valores
		if(count($result[0]) > 0){
			$this->setData($result[0]);
		}
	}

	//Exemplo de Select 
	public static function getList(){

		$sql = new Sql();
		return $sql->select("SELECT * from tb_clientes ORDER BY deslogin;");
	}

	//Exemplo de Select 
	public static function search($login){

		$sql = new Sql();
		return $sql->select("Select * from tb_clientes where deslogin like :SEARCH order by deslogin ",array(
			":SEARCH"=>"%".$login."%"
		));		
	}

	//Exemplo de Select 
	public function login($login, $password){

		$sql = new Sql();

		$result = $sql->select("SELECT * from tb_clientes WHERE deslogin = :LOGIN
			and dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		//Verifica se a consulta possui valores
		if(count($result[0]) > 0){			
			$this->setData($result[0]);
		}else{
			throw new Exception("Não foi possível autenticação");
		}
	}

	//Responsável por distribuir os dados no objeto
	public function setData($data){
		$this->setIdcliente($data['id_cliente']);
		$this->setNomecliente($data['nome_cliente']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));
	}

	//Exemplo de Insert
	public function insert(){

		$sql = new Sql();
		$results = $sql->select("CALL sp_clientes_insert(:NAME, :LOGIN, :PASSWORD)", array(
			':NAME'=>$this->getNomecliente(),
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha()
		));		

		if(count($results) > 0){
			$this->setData($results[0]);
		}

	}

	public function update($login, $password){

		$this->setDeslogin($login);
		$this->setDessenha($password);

		$sql = new Sql();
		
		$sql->query("UPDATE tb_clientes SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE id_cliente = :ID", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha(),
			':ID'=>$this->getIdcliente(),
		));

	}

	public function delete(){

		$sql = new Sql();
		$sql->query("DELETE FROM tb_clientes WHERE id_cliente = :ID",array(
			':ID'=>$this->getIdcliente()
		));

		$this->setIdcliente(0);
		$this->setNomecliente("");
		$this->setDeslogin("");
		$this->setDessenha("");
		$this->setDtcadastro(new DateTime());	

	}

	//Método construtor, sempre que instanciado a classe, nome login e senha são passados
	public function __construct($name = "", $login = "", $password=""){
		$this->setNomecliente($name);
		$this->setDeslogin($login);
		$this->setDessenha($password);
	}

	//Ao exibir um objeto, o método toString é invocado automaticamente e converte o objeto em json
	public function __toString(){

		$data = $this->getDtcadastro();
	    if($data) {
	 
	        $this->getDtcadastro()->format("d/m/Y H:i:s");
	    }
	 
	    return json_encode(array(
	            "id_cliente"=>$this->getIdcliente(),
	            "nome_cliente"=>$this->getNomecliente(),
	            "deslogin"=>$this->getDeslogin(),
	            "dessenha"=>$this->getDessenha(),
	            "dtcadastro"=> $data
	    ));
		}

}


//Procedure do banco para realizar o insert
/*

CREATE PROCEDURE `sp_clientes_insert` (pnome_cliente varchar(45),pdeslogin varchar(64),pdessenha varchar(256)
)

BEGIN

insert into tb_clientes (nome_cliente, deslogin, dessenha) 
values (pnome_cliente, pdeslogin, pdessenha);

select * from tb_clientes where id_cliente = LAST_INSERT_ID();

END*/

?>






