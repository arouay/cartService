<?php
namespace controllers;

use http\Client\Request;
use models\Cart;
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
     * @route("/addOne", "methods"=>["post"])
     */
    public function save(){
        if(URequest::isPost()){
            $cart = new Cart();
            URequest::setPostValuesToObject($cart);
            if(Cart::save($cart))
                echo $cart.' added in database';
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
        $cart->setCreated(URequest::getDatas()["created"]);
        $cart->setCustomer(URequest::getDatas()["customer"]);
        $cart->setItems(URequest::getDatas()["items"]);
        if(Cart::update($cart))
            echo "Updated successfully";
        else
            echo "Updating ends with errors !";
    }
}
