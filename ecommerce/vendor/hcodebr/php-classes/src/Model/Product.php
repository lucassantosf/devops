<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Mailer;

class Product extends Model {

	public static function listAll(){

		$sql = new Sql();

		return $sql->select("select * from tb_products ORDER BY desproduct");

	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_products_save(:idproduct, :desproduct, :vlprice, :vlwidth, :vlheight, :vllength, :vlweight, :desurl)", array(
		    ":idproduct" =>$this->getidproduct(),
		    ":desproduct" =>$this->getdesproduct(),
		    ":vlprice" =>$this->getvlprice(),
		    ":vlwidth" =>$this->getvlwidth(),
		    ":vlheight" =>$this->getvlheight(),
		    ":vllength" =>$this->getvllength(),
		    ":vlweight" =>$this->getvlweight(),
		    ":desurl" =>$this->getdesurl()
		));
		
		$this->setData($results[0]);

	}

	public function get($idproduct){

		$sql = new Sql();

		$results = $sql->select("Select * from tb_products where idproduct = :idproduct", [
			':idproduct'=>$idproduct
		]);

		$this->setData($results[0]);
	}

	public static function checkList($list){

		foreach ($list as &$row) {
			$p = new Product();
			$p->setData($row);
			$row = $p->getValues();
		}

		return $list;
	}



	public function delete(){

		$sql = new Sql();

		$sql->query("Delete from tb_products where idproduct = :idproduct", [
			':idproduct'=>$this->getidproduct()
		]);
	}

	public function checkPhoto(){

		if(file_exists($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR."ecommerce".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."products".DIRECTORY_SEPARATOR.$this->getidproduct().".jpg")){

			$url = "/php/ecommerce/res/site/img/products/".$this->getidproduct().".jpg";

		}else{
			
			$url = "/php/ecommerce/res/site/img/product.jpg";
		
		}

		return $this->setdesphoto($url);

	}

	public function getValues(){

		$this->checkPhoto();

		$values = parent::getValues();

		return $values;
	}

	public function setPhoto($file){

		$extension = explode('.', $file['name']);
		$extension = end($extension);

		switch($extension){

			case "jpg":
			case "jpeg":
				$image = imagecreatefromjpeg($file["tmp_name"]);
				break;
			case "gif":
				$image = imagecreatefromgif($file["tmp_name"]);
				break;
			case "png":
				$image = imagecreatefrompng($file["tmp_name"]);
				break;
		}

		$dist = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR."ecommerce".DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."products".DIRECTORY_SEPARATOR.$this->getidproduct().".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto();

	}

	public function getFromURL($desurl){

		$sql = new Sql();
		
		$rows = $sql->select("select * from tb_products where desurl = :desurl",[
			':desurl'=>$desurl
		]);

		$this->setData($rows[0]);
	}

	public function getCategories(){

		$sql = new Sql();

		return $sql->select("
			SELECT * FROM tb_categories a INNER JOIN tb_productscategories b ON a.idcategory = b.idcategory WHERE b.idproduct = :idproduct",[
			':idproduct'=>$this->getidproduct()
		]);
	}

}

?>