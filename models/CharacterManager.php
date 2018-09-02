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
    
    public function createCharacter($user){
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
            'charowner' => $user
        ));
        return $qExec;
    }

    public function editCharacter($id, $strength, $mana, $agility){
        $db = $this->dbConnect();

        $editQuery = $db->prepare( "UPDATE characters SET strength=:newstrength, mana=:newmana, agility=:newagility WHERE id=:id ");
        $edit = $editQuery->execute(array(
            'newstrength' => $strength,
            'newmana' => $mana,
            'newagility' => $agility,
            'id' => $id
        ));
        return $edit;
    }

    public function deleteCharacter($id){
        $db = $this->dbConnect();

        $deleteCharQuery = "DELETE FROM characters WHERE id='".$id."'";
        $doDelete = $db->query($deleteCharQuery);
        return $doDelete;
    }

    public function getCharacter($id){
        $db = $this->dbConnect();

        $characterQuery = "SELECT * FROM characters WHERE id='".$id."' ";
        $getCharacter = $db->query($characterQuery);
        $character = $getCharacter->fetch(PDO::FETCH_ASSOC);
        return $character;
    }

    public function getCharacters($user, $sortType, $filterjob, $filterrace){
        $db = $this->dbConnect();

        if($filterjob=='none' && $filterrace=='none'){
            if($sortType == null){
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."'";
            }elseif($sortType == 'N°'){
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."' ORDER BY id ";
            }else{
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."' ORDER BY ".$sortType." ";
            }
        }
        elseif($filterjob!='none' && $filterrace=='none'){
            if($sortType == null){
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."' AND job='".$filterjob."'";
            }elseif($sortType == 'N°'){
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."' AND job='".$filterjob."' ORDER BY id ";
            }else{
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."' AND job='".$filterjob."' ORDER BY ".$sortType." ";
            }
        }
        elseif($filterjob=='none' && $filterrace!='none'){
            if($sortType == null){
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."' AND race='".$filterrace."'";
            }elseif($sortType == 'N°'){
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."' AND race='".$filterrace."' ORDER BY id ";
            }else{
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."' AND race='".$filterrace."' ORDER BY ".$sortType." ";
            }
        }
        elseif($filterjob!='none' && $filterrace!='none'){
            if($sortType == null){
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."' AND job='".$filterjob."' AND race='".$filterrace."'";
            }elseif($sortType == 'N°'){
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."' AND job='".$filterjob."' AND race='".$filterrace."' ORDER BY id ";
            }else{
                $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$user."' AND job='".$filterjob."' AND race='".$filterrace."' ORDER BY ".$sortType." ";
            }
        }

        $getCharacters = $db->query($ownerCharactersQuery);
        $charactersArray = $getCharacters->fetchAll(PDO::FETCH_ASSOC);

        return $charactersArray;
    }


}


?>