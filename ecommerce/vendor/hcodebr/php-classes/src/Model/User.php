<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class User extends Model {

	const SESSION = "User";
	const SECRET = "HcodePhp7_Secret";
	const ERROR = "UserError";
	const ERROR_REGISTER = "UserErrorRegister";

	public static function getFromSession(){

		$user = new User();

		if(isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0){

			$user->setData($_SESSION[User::SESSION]);			
		}

		return $user;
	}

	public static function checkLogin($inadmin = true){

		if(
			!isset($_SESSION[User::SESSION]) 
			|| 
			!$_SESSION[User::SESSION] 
			|| 
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
		){	
			//não esta logado
			return false;
		}else{

			if($inadmin === true && (bool)$_SESSION[User::SESSION]['inadmin'] === true){
				//se for usuario admin
				return true;

			}else if($inadmin === false){
				//se a rota não for admin
				return true;

			}else{
				
				return false;
			
			}
		}
	}

	public static function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("select * from tb_users where deslogin = :LOGIN", array(
			":LOGIN"=>$login
		));

		if(count($results) === 0){

			//throw new \Exception("Usuário inexistente ou senha inválida");
			header("Location: /php/ecommerce/admin/login");
			exit;
		}
		
		$data = $results[0];

		//password_verify($password, $data["despassword"]){
		if($password === $data["despassword"]){
			
			$user = new User();		

			$data['desperson'] = utf8_encode($data['desperson']);

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		}else{
			throw new \Exception("Usuário inexistente ou senha inválida");			
		}

	}

	public static function verifyLogin($inadmin = true){

		if(!User::checkLogin($inadmin)){

			if($inadmin){
				header("Location: /php/ecommerce/admin/login");
			}else{
				header("Location: /php/ecommerce/login");
			}

			exit;
		}
	}

	public static function logout(){

		$_SESSION[User::SESSION] = NULL;
	}

	public static function listAll(){

		$sql = new Sql();

		return $sql->select("select * from tb_users a INNER JOIN tb_persons b USING(idperson) order by desperson");
	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(
			":desperson"=>utf8_decode($this->getdesperson()),
			":deslogin"=>$this->getdeslogin(),
			":despassword"=>User::getPasswordHash($this->getdespassword()),
			":desemail"=>$this->getdesemail(),
			":nrphone"=>$this->getnrphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);
	}

	public function get($iduser){

		$sql = new Sql();

		$results = $sql->select("SELECT * from tb_users a INNER JOIN tb_persons b USING(idperson) where a.iduser = :iduser", array(
			"iduser"=>$iduser
		));

		$data = $results[0];

		$data['desperson'] = utf8_encode($data['desperson']);

		$this->setData($results[0]);
	}

	public function update(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(
			"iduser"=>$this->getiduser(),
			":desperson"=>utf8_decode($this->getdesperson()),
			":deslogin"=>$this->getdeslogin(),
			":despassword"=>User::getPasswordHash($this->getdespassword()),
			":desemail"=>$this->getdesemail(),
			":nrphone"=>$this->getnrphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);
	}

	public function delete(){

		$sql = new Sql();

		$sql->query("CALL sp_users_delete(:iduser)", array(
			":iduser"=>$this->getiduser()
		));
	}

	public static function getForgot($email){

		$sql = new Sql();

		$results = $sql->select("
			select * from tb_persons a inner join tb_users b using(idperson) where a.desemail = :email;
			",array(
				":email"=>$email
		));

		if(count($results) === 0){
			//throw new \Exception("Não foi possível recuperar a senha.");
			
		}else{

			$data = $results[0];

			$results2 = $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip", array(
				":iduser"=>$data["iduser"],
				":desip"=>$_SERVER["REMOTE_ADDR"]
			));

			if(count($results2)===0){
				//throw new \Exception("Não foi possivel recuperar a senha");	
			}else{
				$dataRecovery = $results2[0];
				
				$code =base64_encode(openssl_encrypt(MCRYPT_RIJNDAEL_128, User::SECRET, $dataRecovery["idrecovery"],MCRYPT_MODE_ECB));

				$link = "http://localhost:8080/php/ecommerce/admin/forgot/reset?code=$code";

				$mailer = new Mailer($data["desemail"], $data["desperson"], "Redefinir senha da L Store", "forgot", array(
					"name"=>$data["desperson"],
					"link"=>$link
				));

				$mailer->send();

				return $data;
			}

		}
	}

	public static function validForgotDecrypt($code){

		$idrecovery = openssl_encrypt(MCRYPT_RIJNDAEL_128, User::SECRET, base64_decode($code), MCRYPT_MODE_ECB);

		$sql = new Sql();

		$results =$sql->select("
			select * from tB_userspasswordsrecoveries a 
			inner join tb_users b using(iduser)
			inner join tb_persons c using(idperson)
			where
				a.idrecovery = :idrecovery
				and
				a.dtrecovery IS NULL
				and
				DATE_ADD(a.dtregister, interval 1 HOUR) >= NOW();
		",array(
			":idrecovery"=>$idrecovery
		));

		if(count($results)===0){
			throw new \Exception("Não foi possível recuperar a senha");
			
		}else{

			return $results[0];
		}
	}

	public static function setForgotUsed($idrecovery){

		$sql = new Sql();

		$sql->query("UPDATE tB_userspasswordsrecoveries set dtrecovery = NOW() where idrecovery = :idrecovery",array(
			":idrecovery"=>$idrecovery
		));
	}

	public function setPassword($password){
		$sql = new Sql();

		$sql->query("UPDATE tb_users set despassword = :password where iduser = :iduser", array(
			":password"=>$password,
			":iduser"=>$this->getiduser()
		));
	}

	public static function setError($msg){

		$_SESSION[User::ERROR] = $msg;
	}

	public static function getError(){

		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : "";

		User::clearError();

		return $msg;

	}

	public static function clearError(){
		$_SESSION[User::ERROR] = NULL;
	}

	public static function setErrorRegister($msg){
		$_SESSION[User::ERROR_REGISTER] = $msg;	
	}

	public static function getErrorRegister(){

		$msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : "";

		User::clearError();

		return $msg;

	}

	public static function getPasswordHash($password){

		return password_hash($password, PASSWORD_DEFAULT,[
			'cost'=>12
		]);
	}

}

?>