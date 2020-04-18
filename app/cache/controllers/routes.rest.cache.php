<?php
return array("/rest/customers/delete/(.*?)"=>array("delete"=>array("controller"=>"controllers\\RestCostumerController","action"=>"delete","parameters"=>array("*"),"name"=>"RestCostumerController-delete","cache"=>false,"duration"=>false)),"/rest/items/delete/(.*?)"=>array("delete"=>array("controller"=>"controllers\\RestItemController","action"=>"delete","parameters"=>array("*"),"name"=>"RestItemController-delete","cache"=>false,"duration"=>false)),"/rest/carts/delete/(.*?)"=>array("delete"=>array("controller"=>"controllers\\RestCartController","action"=>"delete","parameters"=>array("*"),"name"=>"RestCartController-delete","cache"=>false,"duration"=>false)),"/rest/favorites/delete/(.*?)"=>array("delete"=>array("controller"=>"controllers\\RestFavoritesController","action"=>"delete","parameters"=>array("*"),"name"=>"RestFavoritesController-delete","cache"=>false,"duration"=>false)),"/rest/favorites/getOne/(.+?)/(.*?)"=>array("get"=>array("controller"=>"controllers\\RestFavoritesController","action"=>"getOne","parameters"=>array(0,"~1","~2"),"name"=>"RestFavoritesController-getOne","cache"=>false,"duration"=>false)),"/rest/customers/(index/)?"=>array("controller"=>"controllers\\RestCostumerController","action"=>"index","parameters"=>array(),"name"=>"RestCostumerController-index","cache"=>false,"duration"=>false),"/rest/customers/connect/"=>array("controller"=>"controllers\\RestCostumerController","action"=>"connect","parameters"=>array(),"name"=>"RestCostumerController-connect","cache"=>false,"duration"=>false),"/rest/favorites/getFavoriteItemsByCustomer/(.+?)/"=>array("get"=>array("controller"=>"controllers\\RestFavoritesController","action"=>"getFavoriteItemsByCustomer","parameters"=>array(0),"name"=>"RestFavoritesController-getFavoriteItemsByCustomer","cache"=>false,"duration"=>false)),"/rest/favorites/addItemToFavorites/(.+?)/(.+?)/"=>array("post"=>array("controller"=>"controllers\\RestFavoritesController","action"=>"addItemToFavorites","parameters"=>array(0,1),"name"=>"RestFavoritesController-addItemToFavorites","cache"=>false,"duration"=>false)),"/rest/favorites/removeItemFromFavorites/(.+?)/(.+?)/"=>array("delete"=>array("controller"=>"controllers\\RestFavoritesController","action"=>"removeItemFromFavorites","parameters"=>array(0,1),"name"=>"RestFavoritesController-removeItemFromFavorites","cache"=>false,"duration"=>false)),"/rest/favorites/get/"=>array("get"=>array("controller"=>"controllers\\RestFavoritesController","action"=>"get","parameters"=>array(),"name"=>"RestFavoritesController-get","cache"=>false,"duration"=>false)),"/rest/carts/get/"=>array("get"=>array("controller"=>"controllers\\RestCartController","action"=>"get","parameters"=>array(),"name"=>"RestCartController-get","cache"=>false,"duration"=>false)),"/rest/favorites/update/(.*?)"=>array("patch"=>array("controller"=>"controllers\\RestFavoritesController","action"=>"update","parameters"=>array("*"),"name"=>"RestFavoritesController-update","cache"=>false,"duration"=>false)),"/rest/customers/add/"=>array("post"=>array("controller"=>"controllers\\RestCostumerController","action"=>"add","parameters"=>array(),"name"=>"RestCostumerController-add","cache"=>false,"duration"=>false)),"/rest/favorites/(index/)?"=>array("controller"=>"controllers\\RestFavoritesController","action"=>"index","parameters"=>array(),"name"=>"RestFavoritesController-index","cache"=>false,"duration"=>false),"/rest/favorites/connect/"=>array("controller"=>"controllers\\RestFavoritesController","action"=>"connect","parameters"=>array(),"name"=>"RestFavoritesController-connect","cache"=>false,"duration"=>false),"/rest/items/get/"=>array("get"=>array("controller"=>"controllers\\RestItemController","action"=>"get","parameters"=>array(),"name"=>"RestItemController-get","cache"=>false,"duration"=>false)),"/rest/items/getOne/(.+?)/(.*?)"=>array("get"=>array("controller"=>"controllers\\RestItemController","action"=>"getOne","parameters"=>array(0,"~1","~2"),"name"=>"RestItemController-getOne","cache"=>false,"duration"=>false)),"/rest/items/update/(.*?)"=>array("patch"=>array("controller"=>"controllers\\RestItemController","action"=>"update","parameters"=>array("*"),"name"=>"RestItemController-update","cache"=>false,"duration"=>false)),"/rest/items/add/"=>array("post"=>array("controller"=>"controllers\\RestItemController","action"=>"add","parameters"=>array(),"name"=>"RestItemController-add","cache"=>false,"duration"=>false)),"/rest/items/(index/)?"=>array("controller"=>"controllers\\RestItemController","action"=>"index","parameters"=>array(),"name"=>"RestItemController-index","cache"=>false,"duration"=>false),"/rest/favorites/add/"=>array("post"=>array("controller"=>"controllers\\RestFavoritesController","action"=>"add","parameters"=>array(),"name"=>"RestFavoritesController-add","cache"=>false,"duration"=>false)),"/rest/customers/update/(.*?)"=>array("patch"=>array("controller"=>"controllers\\RestCostumerController","action"=>"update","parameters"=>array("*"),"name"=>"RestCostumerController-update","cache"=>false,"duration"=>false)),"/rest/carts/getAll/"=>array("get"=>array("controller"=>"controllers\\RestCartController","action"=>"get","parameters"=>array(),"name"=>"RestCartController-get","cache"=>false,"duration"=>false)),"/rest/carts/removeItemFromCart/(.+?)/"=>array("put"=>array("controller"=>"controllers\\RestCartController","action"=>"removeItemFromCart","parameters"=>array(0),"name"=>"RestCartController-removeItemFromCart","cache"=>false,"duration"=>false)),"/rest/carts/getCartByDate/(.+?)/"=>array("get"=>array("controller"=>"controllers\\RestCartController","action"=>"getCartByDate","parameters"=>array(0),"name"=>"RestCartController-getCartByDate","cache"=>false,"duration"=>false)),"/rest/carts/addOne/"=>array("post"=>array("controller"=>"controllers\\RestCartController","action"=>"save","parameters"=>array(),"name"=>"RestCartController-save","cache"=>false,"duration"=>false)),"/rest/carts/remove/(.+?)/"=>array("delete"=>array("controller"=>"controllers\\RestCartController","action"=>"remove","parameters"=>array(0),"name"=>"RestCartController-remove","cache"=>false,"duration"=>false)),"/rest/carts/updateOne/(.+?)/"=>array("put"=>array("controller"=>"controllers\\RestCartController","action"=>"updateOne","parameters"=>array(0),"name"=>"RestCartController-updateOne","cache"=>false,"duration"=>false)),"/rest/carts/getItemsByCart/(.+?)/"=>array("get"=>array("controller"=>"controllers\\RestCartController","action"=>"getItemsByCart","parameters"=>array(0),"name"=>"RestCartController-getItemsByCart","cache"=>false,"duration"=>false)),"/rest/carts/getTotalById/(.+?)/"=>array("get"=>array("controller"=>"controllers\\RestCartController","action"=>"getTotalByCart","parameters"=>array(0),"name"=>"RestCartController-getTotalByCart","cache"=>false,"duration"=>false)),"/rest/carts/clearCartById/(.+?)/"=>array("put"=>array("controller"=>"controllers\\RestCartController","action"=>"clearCart","parameters"=>array(0),"name"=>"RestCartController-clearCart","cache"=>false,"duration"=>false)),"/rest/carts/addItemToCart/(.+?)/(.+?)/"=>array("put"=>array("controller"=>"controllers\\RestCartController","action"=>"addItemToCart","parameters"=>array(0,1),"name"=>"RestCartController-addItemToCart","cache"=>false,"duration"=>false)),"/rest/carts/getCartBy/(.+?)/(.+?)/"=>array("get"=>array("controller"=>"controllers\\RestCartController","action"=>"getCartBy","parameters"=>array(0,1),"name"=>"RestCartController-getCartBy","cache"=>false,"duration"=>false)),"/rest/customers/getOne/(.+?)/(.*?)"=>array("get"=>array("controller"=>"controllers\\RestCostumerController","action"=>"getOne","parameters"=>array(0,"~1","~2"),"name"=>"RestCostumerController-getOne","cache"=>false,"duration"=>false)),"/rest/carts/getItemBy/(.+?)/(.+?)/(.+?)/"=>array("get"=>array("controller"=>"controllers\\RestCartController","action"=>"getItemsBy","parameters"=>array(0,1,2),"name"=>"RestCartController-getItemsBy","cache"=>false,"duration"=>false)),"/rest/carts/getOne/(.+?)/(.*?)"=>array("get"=>array("controller"=>"controllers\\RestCartController","action"=>"getOne","parameters"=>array(0,"~1","~2"),"name"=>"RestCartController-getOne","cache"=>false,"duration"=>false)),"/rest/carts/update/(.*?)"=>array("patch"=>array("controller"=>"controllers\\RestCartController","action"=>"update","parameters"=>array("*"),"name"=>"RestCartController-update","cache"=>false,"duration"=>false)),"/rest/carts/add/"=>array("post"=>array("controller"=>"controllers\\RestCartController","action"=>"add","parameters"=>array(),"name"=>"RestCartController-add","cache"=>false,"duration"=>false)),"/rest/carts/(index/)?"=>array("controller"=>"controllers\\RestCartController","action"=>"index","parameters"=>array(),"name"=>"RestCartController-index","cache"=>false,"duration"=>false),"/rest/carts/connect/"=>array("controller"=>"controllers\\RestCartController","action"=>"connect","parameters"=>array(),"name"=>"RestCartController-connect","cache"=>false,"duration"=>false),"/rest/customers/tester/"=>array("get"=>array("controller"=>"controllers\\RestCostumerController","action"=>"tester","parameters"=>array(),"name"=>"RestCostumerController-tester","cache"=>false,"duration"=>false)),"/rest/customers/get/"=>array("get"=>array("controller"=>"controllers\\RestCostumerController","action"=>"get","parameters"=>array(),"name"=>"RestCostumerController-get","cache"=>false,"duration"=>false)),"/rest/items/connect/"=>array("controller"=>"controllers\\RestItemController","action"=>"connect","parameters"=>array(),"name"=>"RestItemController-connect","cache"=>false,"duration"=>false));
