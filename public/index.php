<?php
 
require("../controllers/PagesController.php");
$pagesController = new PagesController();

if( count($_GET)==0 || $_GET['action']=='connect' ){
    $pagesController->index();
}
elseif($_GET['action']=='character'){
    $pagesController->characterView();
}