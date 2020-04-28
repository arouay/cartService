<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Favorites' => 'models\\Favorites',
),
  '#traitMethodOverrides' => array (
  'controllers\\RestFavoritesController' => 
  array (
  ),
),
  'controllers\\RestFavoritesController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/favorites","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Favorites")
  ),
  'controllers\\RestFavoritesController::getFavoriteItemsByCustomer' => array(
    array('#name' => 'authorization', '#type' => 'Ubiquity\\annotations\\rest\\AuthorizationAnnotation'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'customer'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getFavoriteItemsByCustomer/{customer}", "methods"=>["get"])
  ),
  'controllers\\RestFavoritesController::addItemToFavorites' => array(
    array('#name' => 'authorization', '#type' => 'Ubiquity\\annotations\\rest\\AuthorizationAnnotation'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'idCustomer'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'idItem'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/addItemToFavorites/{idCustomer}/{idItem}","methods"=>["post"])
  ),
  'controllers\\RestFavoritesController::removeItemFromFavorites' => array(
    array('#name' => 'authorization', '#type' => 'Ubiquity\\annotations\\rest\\AuthorizationAnnotation'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'idCustomer'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'idItem'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/removeItemFromFavorites/{idCustomer}/{idItem}","methods"=>["delete"])
  ),
);

