<?php 
session_start();
require ('./Core/Database.php');
require ('./Models/BaseModel.php');
require ('./Controllers/BaseController.php');
// require ('./Views/frontend/header/index.php');
// require ('./Views/frontend/homepage/index.php');
// require ('./Views/frontend/hots/index.php');
// require ('./Controllers/HomepageController.php');
// die(var_dump($_REQUEST["controller"]));
$controllerName = ucfirst((strtolower($_REQUEST["controller"] ?? 'welcome')) . 'Controller');
    require_once ("Controllers/${controllerName}.php");
    $actionName = $_REQUEST["action"] ?? 'index';
    
    $controllerObject = new $controllerName;
    $controllerObject->$actionName();

?>