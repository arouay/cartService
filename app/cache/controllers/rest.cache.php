<?php
return array("controllers\\RestCartController"=>array("resource"=>"models\\Cart","authorizations"=>array("update","add","delete"),"route"=>"/rest/carts"),"controllers\\RestCostumerController"=>array("resource"=>"models\\Customer","authorizations"=>array("update","add","delete"),"route"=>"/rest/customers"),"controllers\\RestFavoritesController"=>array("resource"=>"models\\Favorites","authorizations"=>array("update","add","delete"),"route"=>"/rest/favorites"),"controllers\\RestItemController"=>array("resource"=>"models\\Item","authorizations"=>array("update","add","delete"),"route"=>"/rest/items"));
