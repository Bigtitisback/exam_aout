<?php

function afficheDateHeure(){
//[1]Créer une fonction qui affiche une date en français avec le format suivant:
//Vendredi 26 septembre 2014, 16h10
    setlocale(LC_TIME, "fr","fr_FR","fra");
    echo ucfirst(strftime("%A %d %B %Y, %Hh%M "));
}
function htmlDateHeure(){
//[2]Créer une fonction qui retourne une date en HTML en français avec le format suivant:
//Vendredi 26 septembre 2014, 16h10
    setlocale(LC_TIME, "fr","fr_FR","fra");
    return ucfirst(strftime("%A %d %B %Y, %Hh%M "));
}
function afficheNomFormate($nom,$prenom){
//[3]Créer une fonction qui affiche les noms et prénoms au format suivant:
//Prenom NOM (quelque soit le format en entrée)
    setlocale(LC_CTYPE, "fr","fra_FRA", "fr_FR");
    echo ucfirst(strtolower($prenom))." ".strtoupper($nom);
}
function htmlNomFormate($nom,$prenom){
//[4]Créer une fonction qui retourne les noms et prénoms en HTML au format suivant:
//Prenom NOM (quelque soit le format en entrée)
    setlocale(LC_CTYPE, "fr","fra_FRA", "fr_FR");
    return ucfirst(strtolower($prenom))." ".strtoupper($nom);
}
function afficheTitre($titre,$cssClasse=null){
//[5]Créer une fonction qui affiche un titre de niveau 1 (h1), avec une classe commme paramètre optionnel.
    if($cssClasse==null)$sClasse="";
    else $sClasse=" class='".$cssClasse."' ";
    echo "<h1".$sClasse.">".$titre."</h1>";
}
function htmlTitre($titre,$cssClasse=null){
//[6]Créer une fonction qui retourne un titre de niveau 1 (h1) en HTML, avec une classe commme paramètre optionnel.
    if($cssClasse==null)$sClasse="";
    else $sClasse=" class='".$cssClasse."' ";
    return "<h1".$sClasse.">".$titre."</h1>";
}
function afficheTitreNiv($titre,$niv=1,$cssClasse=null){
//[7]Créer une fonction qui affiche  un titre dont le niveau est donné comme paramètre optionnel.
//Vérifier que le niveau donné comme paramètre a une valeur acceptable
    if($cssClasse==null)$sClasse="";
    else $sClasse=" class='".$cssClasse."' ";
    if($niv<1 || $niv>6)echo "<div style='color:red'>Le paramètre \$niv de la fonction afficheTitreNiv doit être compris entre 1 et 6</div>";
    else echo "<h".$niv.$sClasse.">".$titre."</h1>";
}
function htmlTitreNiv($titre,$niv=1,$cssClasse=null){
//[8]Créer une fonction qui retourne un titre en HTML dont le niveau est donné comme paramètre optionnel.
//Vérifier que le niveau donné comme paramètre a une valeur acceptable
    if($cssClasse==null)$sClasse="";
    else $sClasse=" class='".$cssClasse."' ";
    if($niv<1 || $niv>6)echo "<div style='color:red'>Le paramètre \$niv de la fonction htmlTitreNiv doit être compris entre 1 et 6</div>";
    else return "<h".$niv.$sClasse.">".$titre."</h1>";
}
function afficheLien($texte,$url,$cssClasse=null){
//[9]Créer une fonction qui affiche un lien, avec une classe comme paramètre optionnel.
    if($cssClasse==null)$sClasse="";
    else $sClasse=" class='".$cssClasse."' ";
    echo "<a href='".$url."'".$sClasse.">".$texte."</a>";
}
function htmlLien($texte,$url,$cssClasse=null){
//[10]Créer une fonction qui retourne un lien en HTML, avec une classe comme paramètre optionnel.
    if($cssClasse==null)$sClasse="";
    else $sClasse=" class='".$cssClasse."' ";
    return "<a href='".$url."'".$sClasse.">".$texte."</a>";
}
function afficheListe($valeurs,$numerote=false,$cssClasse=null){
//[11]Créer une fonction qui affiche une liste, avec deux paramètres optionnels :
//un booléen signifiant que la liste est numérotée ou à puce et une classe.
    if($cssClasse==null)$sClasse="";
    else $sClasse=" class='".$cssClasse."' ";
    if($numerote==true) $lTag="ol";
    else $lTag="ul";
    echo "<".$lTag.$sClasse.">";
    foreach ($valeurs as $v) {
        echo "<li>".$v."</li>";
    }
    echo "</".$lTag.">";
}
function htmlListe($valeurs,$numerote=false,$cssClasse=null){
//[12]Créer une fonction qui retourne une liste en HTML, avec deux paramètres optionnels :
//un booléen signifiant que la liste est numérotée ou à puce et une classe.
    if($cssClasse==null)$sClasse="";
    else $sClasse=" class='".$cssClasse."' ";
    if($numerote==true) $lTag="ol";
    else $lTag="ul";

    $liste= "<".$lTag.$sClasse.">";
    foreach ($valeurs as $v) {
        $liste.= "<li>".$v."</li>";
    }
    $liste.= "</".$lTag.">";
    return $liste;
}
function afficheTable($contenu,$titres=null,$cssClasse=null){
//[13]Créer une fonction qui retourne un tableau en HTML, avec deux paramètres optionnels :
//un vecteur contant les titres des colonnes et une classe.
    if($cssClasse==null)$sClasse="";
    else $sClasse=" class='".$cssClasse."' ";
    echo "<table".$sClasse.">";
        echo "<tr>";
        if($titres!=null)
          foreach ($titres as $t) {
              echo "<th>".$t."</th>";
          }
        echo "</tr>";
        foreach ($contenu as $ligne) {
            echo "<tr>";
            foreach ($ligne as $e) {
                echo "<td>".$e."</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
}
function htmlTable($contenu,$titres=null,$cssClasse=null){
//[14]Créer une fonction qui retourne un tableau en HTML, avec deux paramètres optionnels :
//un vecteur contant les titres des colonnes et une classe.
    if($cssClasse==null)$sClasse="";
    else $sClasse=" class='".$cssClasse."' ";
    $tableau= "<table".$sClasse.">";
        $tableau.= "<tr>";
        if($titres!=null)
          foreach ($titres as $t) {
              $tableau.= "<th>".$t."</th>";
          }
        $tableau.= "</tr>";
        foreach ($contenu as $ligne) {
            $tableau.= "<tr>";
            foreach ($ligne as $e) {
                $tableau.= "<td>".$e."</td>";
            }
            $tableau.= "</tr>";
        }
    $tableau.= "</table>";
    return $tableau;
}


?>