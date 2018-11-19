<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class OrderStatus extends Model{

	CONST EM_ABERTO = 1;
	CONST AGUARDANDO_PAGAMENTO = 2;
	CONST PAGO = 3;
	CONST ENTREGUE = 4;	

	public static function listAll(){

		$sql = new Sql();

		return $sql->select("select * from tb_ordersstatus order by desstatus");
	}
}

?>