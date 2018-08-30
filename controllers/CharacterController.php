<?php
//session_start();
require_once("./../models/CharacterManager.php");


class CharacterController{
    
    public function createCharacter(){

        $charManager = new CharacterManager();

        if( isset($_POST['charname']) && strlen($_POST['charname']) != 0 && isset($_POST['charjob']) && isset($_POST['charrace']) && 
            isset($_POST['charstrength']) && isset($_POST['charmana']) && isset($_POST['charagility'])){
    
            $entries = $charManager->checkCharacters($_SESSION['user'], $_POST['charname']);

            if(count($entries) == 0){
                
                $executed = $charManager->createCharacter();

                if($executed != false)
                {
                    echo "CHARACTER:: ".$_POST['charname'].", ".$_POST['charrace']." ".$_POST['charjob']." créé !";
                    require_once('../views/characterView.php');
                }
            }
            else{
                require_once('../views/characterView.php');
                echo "CHARACTER:: Vous avez déjà un personnage du nom de ".$_POST['charname'];
            }
        }
        else{
            require_once('../views/characterView.php');
            echo "CHARACTER:: Veuillez indiquer un nom pour votre personnage";
        }
    }

    public function displayCharacters(){

        $charManager = new CharacterManager();

        $titres = ["N°", "Name", "Race", "Job", "Strength", "Mana", "Agility"];
        $characters = $charManager->getCharacters();
        $user = $_SESSION['user'];
        $infos = [
            'titre' => $titres,
            'characters' => $characters,
            'user' => $user
        ];
        
        //require_once('../views/characterView.php');
        header('Location: index.php?action=create-character&info='.$infos);
        // $tableau= "<table>";

        //     $tableau.= "<tr>";
        //     if($titres!=null){
        //         foreach ($titres as $titre) {
        //             if($titre != "owner"){
        //                 $tableau.= "<th>".$titre."</th>";
        //             }
        //         }
        //     }

        //     $tableau.= "</tr>";
        //     foreach ($characters as $character) {
        //         $tableau.= "<tr>";
        //         foreach ($character as $attr) {
        //             if($attr == $character['id']){$rowId = $attr;}
        //             if($attr != $user){$tableau.= "<td>".$attr."</td>";}
        //             //if($attr == $user){$tableau.= "<td>".deleteButton($rowId)."</td>";}
        //         }
        //         $tableau.= "</tr>";
        //     }
        // $tableau.= "</table>";
        
        //echo $tableau;

    }

}