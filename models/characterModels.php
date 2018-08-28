<?php

function checkCharacters($user, $charName){
    $db = dbConnect();

    $checkQuery = "SELECT * FROM characters WHERE owner='".$user."' AND name='".$charName."'";
    $isChecked = $db->query($checkQuery);
    $entries = $isChecked->fetchAll(PDO::FETCH_ASSOC);

    return $entries;
}

function createCharacter(){
    $db = dbConnect();

    $query = $db->prepare( "INSERT INTO characters (name, race, job, strength, mana, agility, owner) 
                            VALUES ( :charname, :charrace, :charjob, :charstrength, :charmana, :charagility, :charowner)" );
    $qExec = $query->execute(array(
        'charname' => $_POST['charname'],
        'charrace' => $_POST['charrace'],
        'charjob' => $_POST['charjob'],
        'charstrength' => $_POST['charstrength'],
        'charmana' => $_POST['charmana'],
        'charagility' => $_POST['charagility'],
        'charowner' => $_SESSION['user']
    ));
}

function dbConnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

?>