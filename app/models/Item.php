<?php
namespace models;
/**
 * @table('item')
*/
class Item{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"label","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $label;

	/**
	 * @column("name"=>"quantity","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $quantity;

	/**
	 * @column("name"=>"unitPrice","nullable"=>false,"dbType"=>"float")
	 * @validator("notNull")
	**/
	private $unitPrice;

    /**
     * @column("name"=>"vat", "nullable"=>fals, "dbType"=>"int(11)")
     * @validator("notNull")
     */
	private $vat;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Cart","name"=>"id_cart","nullable"=>false)
	**/
	private $cart;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getLabel(){
		return $this->label;
	}
	public function getVat(){
	     return $this->vat;
    }
    public function setVat($vat){
	     $this->vat = $vat;
    }
	 public function setLabel($label){
		$this->label=$label;
	}

	 public function getQuantity(){
		return $this->quantity;
	}

	 public function setQuantity($quantity){
		$this->quantity=$quantity;
	}

	 public function getUnitPrice(){
		return $this->unitPrice;
	}

	 public function setUnitPrice($unitPrice){
		$this->unitPrice=$unitPrice;
	}

	 public function getCart(){
		return $this->cart;
	}

	 public function setCart($cart){
		$this->cart=$cart;
	}

	 public function __toString(){
		return ($this->unitPrice??'no value').'';
	}

}