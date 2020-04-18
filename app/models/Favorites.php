<?php


namespace models;
use Ubiquity\orm\DAO;


/**
 * @table('favorites')
 */
class Favorites
{
    /**
     * @id
     * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $id;

    /**
     * @column("name"=>"id_customer","nullable"=>false,"dbType"=>"int(11)")
     **/
    private $id_customer;

    /**
     * @column("name"=>"id_item","nullable"=>false,"dbType"=>"int(11)")
     **/
    private $id_item;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId_customer(){
        return $this->id_customer;
    }
    public function setId_customer($id_customer){
        $this->id_customer = $id_customer;
    }
    public function getId_item(){
        return $this->id_item;
    }
    public function setId_item($id_item){
        $this->id_item = $id_item;
    }

    public static function addOne($customer, $item){
        $favorite = new Favorites();
        $favorite->setId_customer($customer->getId());
        $favorite->setId_item($item->getId());
        return DAO::insert($favorite);
    }

    public static function getFavoriteItems($id_customer)
    {
        $favorite_items = array();
        $favorite_items_duplicated = array();
        $customer = DAO::getOne(Customer::class, ["username" => $id_customer]);
        if ($customer === null)
            $customer = DAO::getById(Customer::class, $id_customer);
        if ($customer != null){
            $favorite_items_by_customer = DAO::getAll(Favorites::class, 'id_customer=?',false,[$customer->getId()]);
            foreach ($favorite_items_by_customer as $item) {
                $cmpt = 0;
                foreach ($favorite_items_by_customer as $item1) {
                    if($item->getId_item() === $item1->getId_item()){
                        $cmpt++;
                        if($cmpt >= 10){
                            array_push($favorite_items_duplicated, $item);
                        }
                    }
                }
            }
            foreach (DAO::getAll(Item::class) as $item) {
                foreach ($favorite_items_duplicated as $item1) {
                    if($item->getId() === $item1->getId_item()){
                        $exist = false;
                        foreach ($favorite_items as $item2) {
                            if($item2->getId() === $item->getId()){
                                $exist = true;
                            }
                        }
                        if($exist === false){
                            array_push($favorite_items,$item);
                        }
                    }
                }
            }
        }
        //else the array will be empty

        return $favorite_items;
    }

    public static function addFavoriteItemManually($id_customer, $id_item){
        $flag = null;
        $customer = DAO::getOne(Customer::class, ["username" => $id_customer]);
        $item = DAO::getOne(Item::class, ["label" => $id_item]);
        if($customer === null || $item === null){
            $customer = DAO::getById(Customer::class, $id_customer);
            $item = DAO::getById(Item::class, $id_item);
        }
        if($customer !== null && $item !== null){
            for($i=0; $i<10; $i++){// should be at least 10 occurrences to be considered as favorite
                $flag = Favorites::addOne($customer,$item);
            }
        }
        return $flag;
    }
    public static function removeItemFromFavorites($id_customer, $id_item){// id_customer -> to remove favorite items proper to a specific customer
        $flag = null;

        $customer = DAO::getOne(Customer::class, ["username" => $id_customer]);
        $item = DAO::getOne(Item::class, ["label" => $id_item]);
        if($customer === null || $item === null){
            $customer = DAO::getById(Customer::class, $id_customer);
            $item = DAO::getById(Item::class, $id_item);
        }
        if($customer !== null && $item !== null){
            foreach (DAO::getAll(Favorites::class) as $favorite){
                if($favorite->getId_customer() === $customer->getId() && $favorite->getId_item() === $item->getId()){
                    $flag = DAO::delete(Favorites::class, $favorite->getId());
                }
            }
        }
        return $flag;
    }
}