<?php
namespace controllers;

use http\Client\Request;
use models\Cart;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use OpenApi\Annotations as OA;


/**
 * Rest Controller RestCartController
 * @route("/rest/carts","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Cart")
 */
class RestCartController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("/getAll","methods"=>["get"])
     * @OA\Get(
     *     path="/rest/carts/getAll",
     *     @OA\Response(
     *          response="200",
     *          description="all carts",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Cart"))
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="End-point doesn't exists",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Url doesn't exists")
     *          )
     *     )
     * )
     */
    public function get(){
        echo $this->_getResponseFormatter()->get(DAO::getAll(Cart::class));
    }

    /**
     * @param array $keyValues
     * @route("/getCartByDate/{keyValues}", "methods"=>["get"])
     * @OA\Get(
     *     path="/rest/carts/getCartByDate/{key}",
     *     @OA\Parameter(
     *          name="date",
     *          in="path",
     *          required=true
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="carts by date",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Cart"))
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="Ressource doesn't exists",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="There is no cart with such a date")
     *          )
     *     )
     * )
     */
    public function getCartByDate($keyValues){
        $carts = DAO::getAll(Cart::class);
        foreach ($carts as $cart){
            if(strcmp($cart->getCreated(),$keyValues) == 0){
                echo $cart;
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

    /**
     * @param array $keyValues
     * @route("/getItemsByCart/{keyValues}", "methods"=>["get"])
     */
    public function getItemsByCart($keyValues){
        $cart = DAO::getById(Cart::class,$keyValues);
        echo $cart->getItems();
    }

    /**
     * @param array $keyValues
     * @route("/getTotalById/{keyValues}", "methods"=>["get"])
     */
    public function getTotalByCart($keyValues){
        $cart = DAO::getById($keyValues);
        echo $cart->getTotal();
    }

    /**
     * @param array $keyValues
     * @route("/clearCartById/{keyValues}", method="put")
     */
    public function clearCart($keyValues){
        $cart = DAO::getById($keyValues);
        $cart->clear();
        if(Cart::update($cart)){
            echo 'Cart cleared';
        }else {
            echo 'Cart not cleared';
        }
    }
}
