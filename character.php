<?php 
    session_start();

    if(isset($username)){
        $_SESSION['user'] = $username;
    }

    echo "CHARACTER:: Voici vos personnages ".$_SESSION['user'] ;    
?>

<form method="post" action="character.php" class="add-form">
    <label for="char-name">Name:</label>
    <input type="text" id="char-name" name="charname">

    <label for="char-job">Job:</label>
    <select name="charjob" id="char-job">
        <option value="warrior">Warrior</option>
        <option value="mage">Mage</option>
        <option value="thief">Thief</option>
        <option value="monk">Monk</option>
    </select>

    <label for="char-race">Race:</label>
    <select name="charrace" id="char-race">
        <option value="human">Human</option>
        <option value="troll">Troll</option>
        <option value="skaven">Skaven</option>
        <option value="werewolf">Werewolf</option>
    </select>

    <label for="char-strength">Strength:</label>
    <input type="range" id="char-strength" name="charstrength" min="0" max="10" value="0">

    <label for="char-mana">Mana:</label>
    <input type="range" id="char-mana" name="charmana" min="0" max="10" value="0">

    <label for="char-agility">Agility:</label>
    <input type="range" id="char-agility" name="charagility" min="0" max="10" value="0">

    <button type="submit" id="char__submit">Register</button>
</form>

<?php

    try{
        $db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }

    // CREATION DU PERSONNAGE
    if( isset($_POST['charname']) && strlen($_POST['charname']) != 0 && isset($_POST['charjob']) && isset($_POST['charrace']) && 
        isset($_POST['charstrength']) && isset($_POST['charmana']) && isset($_POST['charagility'])){

            // echo "CHARACTER:: Tous les champs sont remplis </br>";
            // foreach($_POST as $key => $element){
            //     echo $key.": ".$element."</br>";
            // }
            $checkQuery = "SELECT * FROM characters WHERE owner='".$_SESSION['user']."' AND name='".$_POST['charname']."'";
            $isChecked = $db->query($checkQuery);
            $entries = $isChecked->fetchAll(PDO::FETCH_ASSOC);

            if(count($entries) == 0){
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
                if($qExec != false)
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

    // AFFICHAGE DES PERSONNAGES DE L'UTILISATEUR
    $ownerCharactersQuery = "SELECT * FROM characters WHERE  owner='".$_SESSION['user']."'";
    $getCharacters = $db->query($ownerCharactersQuery);
    $charactersArray = $getCharacters->fetchAll(PDO::FETCH_ASSOC);

    function deleteCharacter($id){
        $deleteCharQuery = "DELETE FROM characters WHERE id='15'";
        $doDelete = $db->query($deleteCharQuery);
    }
    function deleteButton($db, $rowId){
        $button= "<form action=\"delete.php\" method=\"post\">";
        $button.= "<label for=\"delete".$rowId."\">Delete number ".$rowId."</label>";
        $button.= "<input class=\"delete-button\" id=\"delete".$rowId."\"> </form>";
        return $button;
    }
    function htmlTable($contenu, $user, $db, $titres=null, $cssClasse=null){
        if($cssClasse==null)$sClasse="";
        else $sClasse=" class='".$cssClasse."' ";

        $tableau= "<table".$sClasse.">";

            $tableau.= "<tr>";
            if($titres!=null){
                foreach ($titres as $titre) {
                    if($titre != "owner"){
                        $tableau.= "<th>".$titre."</th>";
                    }
                }
            }

            $tableau.= "</tr>";
            foreach ($contenu as $ligne) {
                $tableau.= "<tr>";
                foreach ($ligne as $e) {
                    if($e == $ligne['id']){$rowId = $e;}
                    if($e != $user){$tableau.= "<td>".$e."</td>";}
                    if($e == $user){$tableau.= "<td>".deleteButton($rowId)."</td>";}
                }
                $tableau.= "</tr>";
            }
        $tableau.= "</table>";
        return $tableau;
    }

    $arrayColumns = ["N°", "Name", "Race", "Job", "Strength", "Mana", "Agility"];
    echo htmlTable($charactersArray ,$_SESSION['user'], $db, $arrayColumns);


    

    ?>