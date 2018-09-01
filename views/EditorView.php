<?php

class EditorView{

    public function displayEditor($character){

        $editor = "<h1>You are editing: ".$character['name'].", the ".$character['race']." ".$character['job']."</h1>";
        $editor.=  "<form method='post' action='../public/index.php?action=edit-character&id=".$character['id']."' class='edit-form'>
                        <label for='edit-strength'>Strength:</label>
                        <input type='range' id='edit-strength' name='editstrength' min='0' max='10' value='".$character['strength']."'>

                        <label for='edit-mana'>Mana:</label>
                        <input type='range' id='edit-mana' name='editmana' min='0' max='10' value='".$character['mana']."'>

                        <label for='edit-agility'>Agility:</label>
                        <input type='range' id='edit-agility' name='editagility' min='0' max='10' value='".$character['agility']."'>

                        <button type='submit' id='edit__submit'>Edit</button>
                    </form>";
        
        return $editor;

    }

}

?>