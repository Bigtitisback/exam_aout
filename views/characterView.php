<?php
require_once('../utilities/functions.php');

class CharacterView{

    public function setForm(){
        $form=" 
        <form method='post' action='../public/index.php?action=create-character' class='add-form'>
            <label for='char-name'>Name:</label>
            <input type='text' id='char-name' name='charname'>

            <label for='char-job'>Job:</label>
            <select name='charjob' id='char-job'>
                <option value='warrior'>Warrior</option>
                <option value='mage'>Mage</option>
                <option value='thief'>Thief</option>
                <option value='monk'>Monk</option>
            </select>

            <label for='char-race'>Race:</label>
            <select name='charrace' id='char-race'>
                <option value='human'>Human</option>
                <option value='troll'>Troll</option>
                <option value='skaven'>Skaven</option>
                <option value='werewolf'>Werewolf</option>
            </select>

            <label for='char-strength'>Strength:</label>
            <input type='range' id='char-strength' name='charstrength' min='0' max='10' value='0'>

            <label for='char-mana'>Mana:</label>
            <input type='range' id='char-mana' name='charmana' min='0' max='10' value='0'>

            <label for='char-agility'>Agility:</label>
            <input type='range' id='char-agility' name='charagility' min='0' max='10' value='0'>

            <button type='submit' id='char__submit'>Create</button>
        </form> ";

        return $form;
    }

    public function setCharacterTable($characters, $titres, $user){
         $tableau= "<table>";

            $tableau.= "<tr>";
            if($titres!=null){
                foreach ($titres as $titre) {
                    if($titre != "owner"){
                        $tableau.= "<th>".$titre."</th>";
                    }
                }
            }

            $tableau.= "</tr>";
            foreach ($characters as $character) {
                $tableau.= "<tr>";
                foreach ($character as $attr) {
                    if($attr == $character['id']){$rowId = $attr;}
                    if($attr != $user){$tableau.= "<td>".$attr."</td>";}
                    if($attr == $user){$tableau.= "<td>".$this->deleteButton($rowId)."</td>";}
                }
                $tableau.= "</tr>";
            }
        $tableau.= "</table>";
        return $tableau;
    }
    function deleteButton($rowId){
        $button= "<form action='../public/index.php?action=delete-character&id=".$rowId."' method=\"post\">";
        $button.= "<label for=\"delete".$rowId."\">Delete number ".$rowId."</label>";
        $button.= "<input type=\"submit\" class=\"delete-button\" id=\"delete".$rowId."\" value=\"X\"> </form>";
        return $button;
    }
}
    // if(isset($infos)){
    //     echo "coucou";
    //     htmlTable($_GET['info']['characters'], $_GET['info']['titres']);
    // }
    

    // function deleteCharacter($id){
    //     $deleteCharQuery = "DELETE FROM characters WHERE id='".$id."'";
    //     $doDelete = $db->query($deleteCharQuery);
    // }
   
    //echo htmlTable($charactersArray ,$_SESSION['user'], $db, $arrayColumns);

?>