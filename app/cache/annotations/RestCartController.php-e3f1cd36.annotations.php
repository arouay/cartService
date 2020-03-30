<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Request' => 'http\\Client\\Request',
  'Cart' => 'models\\Cart',
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
);

