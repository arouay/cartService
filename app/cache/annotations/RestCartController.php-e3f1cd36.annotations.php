<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Request' => 'http\\Client\\Request',
  'Cart' => 'models\\Cart',
  'Customer' => 'models\\Customer',
  'Item' => 'models\\Item',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\RestCartController' => 
  array (
  ),
),
  'controllers\\RestCartController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/carts","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Cart")
  ),
  'controllers\\RestCartController::get' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAll","methods"=>["get"])
  ),
  'controllers\\RestCartController::getCartByDate' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getCartByDate/{keyValues}", "methods"=>["get"])
  ),
  'controllers\\RestCartController::save' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/addOne", "methods"=>["post"])
  ),
  'controllers\\RestCartController::remove' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/remove/{keyValues}", "methods"=>["delete"])
  ),
  'controllers\\RestCartController::updateOne' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/updateOne/{keyValues}", "methods"=>["put"])
  ),
  'controllers\\RestCartController::getItemsByCart' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getItemsByCart/{keyValues}", "methods"=>["get"])
  ),
  'controllers\\RestCartController::getTotalByCart' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getTotalById/{keyValues}", "methods"=>["get"])
  ),
  'controllers\\RestCartController::clearCart' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/clearCartById/{keyValues}", "methods"=>["put"])
  ),
  'controllers\\RestCartController::addItemToCart' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer', 'name' => 'idCart'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer', 'name' => 'idItem'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/addItemToCart/{idCart}/{idItem}", "methods"=>["put"])
  ),
  'controllers\\RestCartController::removeItemFromCart' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer', 'name' => 'idCart'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer', 'name' => 'idItem'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/removeItemFromCart/{idCart}/{idItem}", "methods"=>["put"])
  ),
  'controllers\\RestCartController::getCartBy' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'field'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'var'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getCartBy/{field}/{var}", "methods"=>["get"])
  ),
  'controllers\\RestCartController::getItemsBy' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer', 'name' => 'idCart'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'field'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'var'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getItemBy/{idCart}/{field}/{var}", "methods"=>["get"])
  ),
);

