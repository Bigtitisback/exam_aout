<?php
require_once("Manager.php");

class CharacterManager extends Manager{

    public function checkCharacters($user, $charName){
        $db = $this->dbConnect();
    
        $checkQuery = "SELECT * FROM characters WHERE owner='".$user."' AND name='".$charName."'";
        $isChecked = $db->query($checkQuery);
        $entries = $isChecked->fetchAll(PDO::FETCH_ASSOC);
    
        return $entries;
    }
    
    public function createCharacter(){
        $db = $this->dbConnect();
    
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
        return $qExec;
    }

    public function getCharacters(){
        $db = $this->dbConnect();

        $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$_SESSION['user']."'";
        $getCharacters = $db->query($ownerCharactersQuery);
        $charactersArray = $getCharacters->fetchAll(PDO::FETCH_ASSOC);

        return $charactersArray;
    }


}


?>