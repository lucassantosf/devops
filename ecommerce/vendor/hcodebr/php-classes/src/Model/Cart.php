<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class Cart extends Model {

	const SESSION = "Cart";

	public static function getFromSession(){

		$cart = new Cart();

		if(isset($_SESSION[Cart::SESSION]) && (int)$_SESSION[Cart::SESSION]['idcart'] > 0){

			$cart->get((int)$_SESSION[Cart::SESSION]['idcart']);

		}else{

			$cart->getFromSessionID();

			if(!(int)$cart->getidcart()>0){
				
				$data = [
					'dessessionid'=>session_id(),
				];

				$user = User::getFromSession();

				if($user->getiduser() >)
			}
		}

		return $cart;

	}

	

	public function getFromSessionID(){

		$sql = new Sql();

		$results = $sql->select("select * from tb_carts where dessessionid = :dessessionid",[
			':dessessionid'=>session_id()
		]);

		if(count($results) > 0){
			$this->setData($results[0]);
		}

	}


	public function get(int $idcart){

		$sql = new Sql();

		$results = $sql->select("select * from tb_carts where idcart = :idcart",[
			':idcart'=>$idcart
		]);

		if(count($results) > 0){
			$this->setData($results[0]);
		}
		

	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_carts_save(:idcart, :dessessionid, :iduser, :deszipcode, :vlfreight, :nrdays)",[
			':idcart'=>$this->getidcart(),
			':dessessionid'=>$this->getdessessionid(),
			':iduser'=>$this->getiduser(),
			':deszipcode'=>$this->getdeszipcode(),
			':vlfreight'=>$this->getvlfreight(),
			':nrdays'=>$this->getnrdays()
		]);

		$this->setData($results[0]);
	}


}

?>