<?php
require("./../models/CharacterManager.php");

$charManager = new CharacterManager();

if( isset($_POST['charname']) && strlen($_POST['charname']) != 0 && isset($_POST['charjob']) && isset($_POST['charrace']) && 
    isset($_POST['charstrength']) && isset($_POST['charmana']) && isset($_POST['charagility'])){

        $entries = $charManager->checkCharacters($_SESSION['user'], $_POST['charname']);

        if(count($entries) == 0){
            
            $executed = $charManager->createCharacter();

            if($executed != false)
            {
                echo "CHARACTER:: ".$_POST['charname'].", ".$_POST['charrace']." ".$_POST['charjob']." créé !";
            }
        }
        else{
            echo "CHARACTER:: Vous avez déjà un personnage du nom de ".$_POST['charname'];
        }
}
else{
    echo "CHARACTER:: Veuillez indiquer un nom pour votre personnage";
}