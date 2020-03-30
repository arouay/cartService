<?php
return array("/rest/carts/delete/(.*?)"=>array("delete"=>array("controller"=>"controllers\\RestCartController","action"=>"delete","parameters"=>array("*"),"name"=>"RestCartController-delete","cache"=>false,"duration"=>false)),"/rest/items/delete/(.*?)"=>array("delete"=>array("controller"=>"controllers\\RestItemController","action"=>"delete","parameters"=>array("*"),"name"=>"RestItemController-delete","cache"=>false,"duration"=>false)),"/rest/customers/delete/(.*?)"=>array("delete"=>array("controller"=>"controllers\\RestCostumerController","action"=>"delete","parameters"=>array("*"),"name"=>"RestCostumerController-delete","cache"=>false,"duration"=>false)),"/rest/carts/get/"=>array("get"=>array("controller"=>"controllers\\RestCartController","action"=>"get","parameters"=>array(),"name"=>"RestCartController-get","cache"=>false,"duration"=>false)),"/rest/customers/update/(.*?)"=>array("patch"=>array("controller"=>"controllers\\RestCostumerController","action"=>"update","parameters"=>array("*"),"name"=>"RestCostumerController-update","cache"=>false,"duration"=>false)),"/rest/items/(index/)?"=>array("controller"=>"controllers\\RestItemController","action"=>"index","parameters"=>array(),"name"=>"RestItemController-index","cache"=>false,"duration"=>false),"/rest/items/add/"=>array("post"=>array("controller"=>"controllers\\RestItemController","action"=>"add","parameters"=>array(),"name"=>"RestItemController-add","cache"=>false,"duration"=>false)),"/rest/items/update/(.*?)"=>array("patch"=>array("controller"=>"controllers\\RestItemController","action"=>"update","parameters"=>array("*"),"name"=>"RestItemController-update","cache"=>false,"duration"=>false)),"/rest/items/getOne/(.+?)/(.*?)"=>array("get"=>array("controller"=>"controllers\\RestItemController","action"=>"getOne","parameters"=>array(0,"~1","~2"),"name"=>"RestItemController-getOne","cache"=>false,"duration"=>false)),"/rest/items/get/"=>array("get"=>array("controller"=>"controllers\\RestItemController","action"=>"get","parameters"=>array(),"name"=>"RestItemController-get","cache"=>false,"duration"=>false)),"/rest/customers/connect/"=>array("controller"=>"controllers\\RestCostumerController","action"=>"connect","parameters"=>array(),"name"=>"RestCostumerController-connect","cache"=>false,"duration"=>false),"/rest/customers/(index/)?"=>array("controller"=>"controllers\\RestCostumerController","action"=>"index","parameters"=>array(),"name"=>"RestCostumerController-index","cache"=>false,"duration"=>false),"/rest/customers/add/"=>array("post"=>array("controller"=>"controllers\\RestCostumerController","action"=>"add","parameters"=>array(),"name"=>"RestCostumerController-add","cache"=>false,"duration"=>false)),"/rest/customers/getOne/(.+?)/(.*?)"=>array("get"=>array("controller"=>"controllers\\RestCostumerController","action"=>"getOne","parameters"=>array(0,"~1","~2"),"name"=>"RestCostumerController-getOne","cache"=>false,"duration"=>false)),"/rest/carts/getAll/"=>array("get"=>array("controller"=>"controllers\\RestCartController","action"=>"get","parameters"=>array(),"name"=>"RestCartController-get","cache"=>false,"duration"=>false)),"/rest/customers/get/"=>array("get"=>array("controller"=>"controllers\\RestCostumerController","action"=>"get","parameters"=>array(),"name"=>"RestCostumerController-get","cache"=>false,"duration"=>false)),"/rest/customers/tester/"=>array("get"=>array("controller"=>"controllers\\RestCostumerController","action"=>"tester","parameters"=>array(),"name"=>"RestCostumerController-tester","cache"=>false,"duration"=>false)),"/rest/carts/connect/"=>array("controller"=>"controllers\\RestCartController","action"=>"connect","parameters"=>array(),"name"=>"RestCartController-connect","cache"=>false,"duration"=>false),"/rest/carts/(index/)?"=>array("controller"=>"controllers\\RestCartController","action"=>"index","parameters"=>array(),"name"=>"RestCartController-index","cache"=>false,"duration"=>false),"/rest/carts/add/"=>array("post"=>array("controller"=>"controllers\\RestCartController","action"=>"add","parameters"=>array(),"name"=>"RestCartController-add","cache"=>false,"duration"=>false)),"/rest/carts/update/(.*?)"=>array("patch"=>array("controller"=>"controllers\\RestCartController","action"=>"update","parameters"=>array("*"),"name"=>"RestCartController-update","cache"=>false,"duration"=>false)),"/rest/carts/getOne/(.+?)/(.*?)"=>array("get"=>array("controller"=>"controllers\\RestCartController","action"=>"getOne","parameters"=>array(0,"~1","~2"),"name"=>"RestCartController-getOne","cache"=>false,"duration"=>false)),"/rest/carts/updateOne/(.+?)/"=>array("put"=>array("controller"=>"controllers\\RestCartController","action"=>"updateOne","parameters"=>array(0),"name"=>"RestCartController-updateOne","cache"=>false,"duration"=>false)),"/rest/carts/remove/(.+?)/"=>array("delete"=>array("controller"=>"controllers\\RestCartController","action"=>"remove","parameters"=>array(0),"name"=>"RestCartController-remove","cache"=>false,"duration"=>false)),"/rest/carts/addOne/"=>array("post"=>array("controller"=>"controllers\\RestCartController","action"=>"save","parameters"=>array(),"name"=>"RestCartController-save","cache"=>false,"duration"=>false)),"/rest/items/connect/"=>array("controller"=>"controllers\\RestItemController","action"=>"connect","parameters"=>array(),"name"=>"RestItemController-connect","cache"=>false,"duration"=>false));
