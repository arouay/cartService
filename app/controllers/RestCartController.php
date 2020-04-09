<?php
namespace controllers;

use http\Client\Request;
use models\Cart;
use models\Customer;
use models\Item;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;


/**
 * Rest Controller RestCartController
 * @route("/rest/carts","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Cart")
 */
class RestCartController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("/getAll","methods"=>["get"])
     */
    public function get(){
        echo $this->_getResponseFormatter()->get(DAO::getAll(Cart::class));
    }

    /**
     * @param array $keyValues
     * @route("/getCartByDate/{keyValues}", "methods"=>["get"])     
     */
    public function getCartByDate($keyValues){
        $carts = DAO::getAll(Cart::class);
        foreach ($carts as $cart){
            if(strcmp($cart->getCreated(),$keyValues) == 0){
                echo json_encode($cart);
            }
        }
    }

    /**
     * @route("/addOne", "methods"=>["post"])
     */
    public function save(){
        if(URequest::isPost()){
            $cart = new Cart();
            URequest::setPostValuesToObject($cart);
            $customer_id = $cart->getCustomer();

            if($cart->getCreated() === null)
                $cart->setCreated(date("Y-m-d"));

            $cart->setCustomer(DAO::getById(Customer::class, $customer_id));

            if(Cart::save($cart))
                echo 'cart added in database';
            else
                echo 'Error adding !';
        }
    }

    /**
     * @param array $keyValues
     * @route("/remove/{keyValues}", "methods"=>["delete"])
     */
    public function remove($keyValues){
        if(Cart::delete($keyValues))
            echo "Cart removed from database";
        else
            echo "Error removing !";
    }

    /**
     * @param array $keyValues
     * @route("/updateOne/{keyValues}", "methods"=>["put"])
     */
    public function updateOne($keyValues){
        $cart=DAO::getById(Cart::class,$keyValues);
        if($cart != null){
            $cart->setCreated(URequest::getDatas()["created"]);
            $cart->setCustomer(DAO::getById(Customer::class,URequest::getDatas()["customer"]));

            if(Cart::update($cart))
                echo "Updated successfully";
            else
                echo "Updating ends with errors !";
        }else
            echo "cart does not exists !";
    }

    /**
     * @param array $keyValues
     * @route("/getItemsByCart/{keyValues}", "methods"=>["get"])
     */
    public function getItemsByCart($keyValues){
        $cart = DAO::getById(Cart::class,$keyValues);
        if($cart != null)
            echo json_encode($cart->getItems());
        else
            echo "cart doesn't exists !";

    }

    /**
     * @param array $keyValues
     * @route("/getTotalById/{keyValues}", "methods"=>["get"])
     */
    public function getTotalByCart($keyValues){
        $cart = DAO::getById(Cart::class,$keyValues);
        if($cart != null)
            echo $cart->getTotal();
        else
            echo "cart doesn't exists !";
    }

    /**
     * @param array $keyValues
     * @route("/clearCartById/{keyValues}", "methods"=>["put"])
     */
    public function clearCart($keyValues){
        $cart = DAO::getById(Cart::class,$keyValues);
        if($cart != null){
            $cart->clear();
            if(Cart::update($cart))
                echo 'Cart cleared';
            else
                echo 'Cart not cleared';
        }else
            echo "cart doesn't exists !";
    }

    /**
     * @param integer $idCart
     * @param integer $idItem
     * @route("/addItemToCart/{idCart}/{idItem}", "methods"=>["put"])
     */
    public function addItemToCart($idCart,$idItem){
        $cart = DAO::getById(Cart::class,$idCart);
        if($cart != null){
            $item = DAO::getById(Item::class,$idItem);
            if($item != null){
                if($cart->addItem($item))
                    echo 'Item added successfully';
                else if ($cart->addItem($item) === null)
                    echo 'No item left !';
                else
                    echo 'Item was not added';
            }else
                echo 'Item does not exists !';
        }else
            echo "cart does not exists !";
    }

    /**
     * @param integer $idItem
     * @route("/removeItemFromCart/{idItem}", "methods"=>["put"])
     */
    public function removeItemFromCart($idItem){//set cart_id foreign key to null + increment quantity field in item
        $item = DAO::getById(Item::class, $idItem);
        if($item != null){
            if($item->getCart() != null){
                $item->setCart(new Cart());
                $item->setQuantity($item->getQuantity()+1);
                if(DAO::update($item))
                    echo 'Item removed successfully';
                else
                    echo 'Item was not removed !';
            }else
                echo 'Item does not belong to any cart !';
        }else
            echo 'Item does not exists !';
    }

    /**
     * @param string $field
     * @param integer|string $var
     * @route("/getCartBy/{field}/{var}", "methods"=>["get"])
     */
    public function getCartBy($field, $var){
        if(Cart::getCartsBy($field, $var) != null)
            echo json_encode(Cart::getCartsBy($field, $var));
        else
            echo "Cart doesn't exists";
    }

    /**
     * @param integer $idCart
     * @param string $field
     * @param integer|string $var
     * @route("/getItemBy/{idCart}/{field}/{var}", "methods"=>["get"])
     */
    public function getItemsBy($idCart, $field, $var){
        $cart = DAO::getById(Cart::class, $idCart);
        if($cart != null)
            echo json_encode($cart->getItemBy($field, $var));
        else
            echo "Cart doesn't exists";
    }
}
