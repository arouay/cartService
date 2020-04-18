<?php
namespace controllers;

use models\Favorites;

/**
 * Rest Controller RestFavoritesController
 * @route("/rest/favorites","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Favorites")
 */
class RestFavoritesController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @param integer|string $customer
     * @route("/getFavoriteItemsByCustomer/{customer}", "methods"=>["get"])
     */
    public function getFavoriteItemsByCustomer($customer){
        echo $this->getResponseFormatter()->get(Favorites::getFavoriteItems($customer));
    }


    /**
     * @param integer|string $idCustomer
     * @param integer|string $idItem
     * @route("/addItemToFavorites/{idCustomer}/{idItem}","methods"=>["post"])
     */
    public function addItemToFavorites($idCustomer, $idItem){
        $result = Favorites::addFavoriteItemManually($idCustomer,$idItem);
        if($result != null)
            if($result != false)
                echo "Item manually added to favorites successfully";
            else
                echo "Item does not added to favorites !";
        else
            echo "Error";
    }

    /**
     * @param integer|string $idCustomer
     * @param integer|string $idItem
     * @route("/removeItemFromFavorites/{idCustomer}/{idItem}","methods"=>["delete"])
     */
    public function removeItemFromFavorites($idCustomer, $idItem){
        $result = Favorites::removeItemFromFavorites($idCustomer,$idItem);
        if($result != null)
            if($result)
                echo "Item removed from favorites successfully";
            else
                echo "Item does not removed from favorites !";
        else
            echo "Item not found !";

    }
}
