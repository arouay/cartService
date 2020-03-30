<?php
namespace models;
use Ubiquity\orm\DAO;

/**
 * @table('cart')
*/
class Cart{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"created","nullable"=>false,"dbType"=>"datetime")
	 * @validator("type","dateTime","constraints"=>array("notNull"=>true))
	**/
	private $created;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Customer","name"=>"id","nullable"=>false)
	**/
	private $customer;

	/**
	 * @oneToMany("mappedBy"=>"cart","className"=>"models\\Item")
	**/
	private $items;

	function __construct()
    {
    }

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getCreated(){
		return $this->created;
	}

	 public function setCreated($created){
		$this->created=$created;
	}

	 public function getCustomer(){
		return $this->customer;
	}

	 public function setCustomer($customer){
		$this->customer=$customer;
	}

	 public function getItems(){
		return $this->items;
	}

	 public function setItems($items){
		$this->items=$items;
	}

	 public function __toString(){
		return ($this->created??'no value').'';
	}

	public static function save($cart){
	    return DAO::insert($cart);
    }

    public static function delete($id){
	    return DAO::delete(Cart::class,$id);
    }

    public static function update($cart){
        return DAO::update($cart);
    }



    public function addItem($item){
	    if(DAO::save($item)){
            $item->setCart($this);
            array_push($this->items,$item);
	        return true;
        }
	    return false;
    }
    public function removeItem($id){
	    foreach ($this->items as &$item){
            if($item->getId() == $id){
                unset($item);
                return true;
            }
        }
	    return false;
    }
    public function updateItem($id,$item){
	    foreach ($this->items as &$iteration){
	        if($iteration->getId() == $id){
	            $iteration = $item;
	            return true;//found => break
            }
        }
	    return false;//not_found
    }
    public function getTotal(){
	    $total = 0;
	    foreach ($this->items as $item){
	        $total += $item->getUnitPrice();
        }
	    return $total;
    }
    public function clear(){
	    reset($this->items);
    }
}