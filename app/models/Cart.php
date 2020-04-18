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
	 * @oneToMany("mappedBy"=>"cart","className"=>"models\\Item")
	**/
	private $items;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Customer","name"=>"id_customer","nullable"=>false)
	**/
	private $customer;

	function __construct()
    {
        $this->items = array();
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

	 public function getItems(){
		return $this->items;
	}

	 public function setItems($items){
		$this->items=$items;
	}

	 public function getCustomer(){
		return $this->customer;
	}

	 public function setCustomer($customer){
		$this->customer=$customer;
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

    public static function getCartsBy($field,$value){
        $carts = array();
        if($field === "customer"){
            foreach (DAO::getAll(Cart::class) as $cart)
                if($cart->getId() === $value || $cart->getCreated() === $value)
                    array_push($carts, $cart);
            return $carts;
        }else if($field === "id" || $field === "created"){
            array_push($cats, DAO::getOne(Cart::class, [$field=>$value]));
            return $carts;
        }else
            return null;
    }

    public function getItemsBy($field, $value){
        $items = array();
        foreach ($this->getItems() as $item)
            if($field === $item->getId() || $field === $item->getLabel() || $field === $item->getQuantity() || $field === $item->getUnitPrice())
                array_push($items, $item);
        return $items;
    }

    public function addItem($item){
        if($item->getQuantity() > 0){
            $item->setCart($this);
            $item->setQuantity($item->getQuantity()-1);
            Favorites::addOne($this->customer, $item);
            return DAO::update($item);
        }else
            return null;

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
        foreach ($this->getItems() as $item) {
            $item->setCart(new Cart);
            $item->setQuantity($item->getQuantity()+1);
            DAO::update($item);
        }
    }
}