<?php

class Cliente {

	private $idusuario;	
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}
	public function setIdusuario($value){
		$this->idusuario = $value;
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

		$result = $sql->select("SELECT * from tb_usuarios WHERE id_usuario = :ID", array(
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
		return $sql->select("SELECT * from tb_usuarios ORDER BY desclogin;");
	}

	//Exemplo de Select 
	public static function search($login){

		$sql = new Sql();
		return $sql->select("Select * from tb_usuarios where desclogin like :SEARCH order by deslogin ",array(
			":SEARCH"=>"%".$login."%"
		));		
	}

	//Exemplo de Select 
	public function login($login, $password){

		$sql = new Sql();

		$result = $sql->select("SELECT * from tb_usuarios WHERE desclogin = :LOGIN
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
		$this->setIdusuario($data['id_usuario']);		
		$this->setDeslogin($data['desclogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));
	}

	//Exemplo de Insert
	public function insert(){

		$sql = new Sql();
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(			
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
		
		$sql->query("UPDATE tb_usuarios SET desclogin = :LOGIN, dessenha = :PASSWORD WHERE id_usuario = :ID", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha(),
			':ID'=>$this->getIdcliente(),
		));

	}

	public function delete(){

		$sql = new Sql();
		$sql->query("DELETE FROM tb_usuarios WHERE id_usuario = :ID",array(
			':ID'=>$this->getIdcliente()
		));

		$this->setIdusuario(0);
		$this->setDeslogin("");
		$this->setDessenha("");
		$this->setDtcadastro(new DateTime());	

	}

	//Método construtor, sempre que instanciado a classe, nome login e senha são passados
	public function __construct($login = "", $password=""){
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
	            "id_usuario"=>$this->getIdusuario(),	            
	            "desclogin"=>$this->getDeslogin(),
	            "dessenha"=>$this->getDessenha(),
	            "dtcadastro"=> $data
	    ));
		}

}


//Procedure do banco para realizar o insert
/*

CREATE PROCEDURE `sp_usuarios_insert` (pdeslogin varchar(64),pdessenha varchar(256)
)

BEGIN

insert into tb_usuarios (desclogin, dessenha) 
values (pdeslogin, pdessenha);

select * from tb_usuarios where id_usuario = LAST_INSERT_ID();

END*/

?>






