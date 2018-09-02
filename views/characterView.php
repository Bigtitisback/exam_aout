<?php

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
        </form> 
        
        <form method='post' action='../public/index.php?action=filter-character' class='filter-form'>

            <label for='filter-job'>Job:</label>
            <select name='filterjob' id='filter-job'>
                <option value='none'>None</option>
                <option value='warrior'>Warrior</option>
                <option value='mage'>Mage</option>
                <option value='thief'>Thief</option>
                <option value='monk'>Monk</option>
            </select>

            <label for='filter-race'>Race:</label>
            <select name='filterrace' id='filter-race'>
                <option value='none'>None</option>
                <option value='human'>Human</option>
                <option value='troll'>Troll</option>
                <option value='skaven'>Skaven</option>
                <option value='werewolf'>Werewolf</option>
            </select>

            <button type='submit' id='filter__submit'>Filter</button>
        </form> ";

        return $form;
    }

    public function setFilter(){
        $filter = null;
    }

    public function setCharacterTable($characters, $titres, $user){
         $tableau= "<table>";

            $tableau.= "<tr>";
            if($titres!=null){
                foreach ($titres as $titre) {
                    if($titre != "owner"){
                        $tableau.= "<th>".$this->sortButton($titre)."</th>";
                    }
                }
            }
            $tableau.= "</tr>";

            foreach ($characters as $character) {
                $tableau.= "<tr>";
                foreach ($character as $attr) {
                    if($attr == $character['id']){$rowId = $attr;}
                    if($attr != $user){$tableau.= "<td>".$attr."</td>";}
                    if($attr == $user){
                        $tableau.= "<td>".$this->modifyButton($rowId)."</td>";
                        $tableau.= "<td>".$this->deleteButton($rowId)."</td>";
                    }
                }
                $tableau.= "</tr>";
            }
        $tableau.= "</table>";
        return $tableau;
    }

    private function sortButton($sortType){
        $button= "<form action='../public/index.php?action=sort-character&sort=".$sortType."' method=\"post\">";
        $button.= "<label for=\"sort".$sortType."\">".$sortType."</label>";
        $button.= "<input type=\"submit\" class=\"sort-button\" id=\"sort".$sortType."\" value=\"sort\"> </form>";
        return $button;
    }

    private function modifyButton($rowId){
        $button= "<form action='../public/index.php?action=modify-character&id=".$rowId."' method=\"post\">";
        $button.= "<input type=\"submit\" class=\"modify-button\" id=\"modify".$rowId."\" value=\"M\"> </form>";
        return $button;
    }

    private function deleteButton($rowId){
        $button= "<form action='../public/index.php?action=delete-character&id=".$rowId."' method=\"post\">";
        $button.= "<input type=\"submit\" class=\"delete-button\" id=\"delete".$rowId."\" value=\"X\"> </form>";
        return $button;
    }
}
    

?>