<?php
 
require_once("../controllers/PagesController.php");
$pagesController = new PagesController();

if( count($_GET)==0 || $_GET['action']=='connect' ){
    $pagesController->index();
}
elseif ($_GET['action']=='register') {
    $pagesController->register();
}
elseif ($_GET['action']=='create-character') {
    $pagesController->createCharacter();
}
elseif ($_GET['action']=='connect' || $_GET['action']=='register' || $_GET['action']=='create-character'){
    $pagesController->displayCharacter();
}