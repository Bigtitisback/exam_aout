<?php
session_start();
 
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
elseif ($_GET['action']=='delete-character'){
    $pagesController->deleteCharacter($_GET['id']);
}
elseif ($_GET['action']=='modify-character'){
    $pagesController->modifyCharacter($_GET['id']);
}
elseif ($_GET['action']=='edit-character'){
    $pagesController->editCharacter($_GET['id'], $_POST['editstrength'], $_POST['editmana'], $_POST['editagility']);
}
elseif ($_GET['action']=='filter-character'){
    $pagesController->filterCharacter($_POST['filterjob'], $_POST['filterrace']);
}
elseif ($_GET['action']=='sort-character'){
    $pagesController->sortCharacter($_GET['sort']);
}