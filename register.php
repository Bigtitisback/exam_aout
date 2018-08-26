<?php
    // CONNECTION A LA DB AVEC PDO
    try{
        $db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }

    // CHAMPS D'INSCRIPTION
    //SI IL Y A QUELQUE CHOSE DANS LES CHAMPS AU SUBMIT
    if(isset($_POST['username']) && isset($_POST['mail']) && isset($_POST['password']))
    {

        // ON STOCKE LES INFOS RECUPEREES DANS LE FORMULAIRES 
        
        $username = $_POST['username'];
        $mail = $_POST['mail'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // ON FAIT UNE QUERY DE VERIFICATION
        $checkQuery = "SELECT * FROM users WHERE username='".$username."' OR email ='".$mail."'" ;
        // ON ENVOIE LA REQUETE PUIS ON STOCKE LE TABLEAU DE RESULTATS DE LA REQUETE
        $isChecked = $db->query($checkQuery);
        $entries = $isChecked->fetchAll(PDO::FETCH_ASSOC);
        
        // SI 0 RESULTAT ALORS
        if(count($entries) == 0)
        {
        // ON RENTRE LES INFOS DU FORMULAIRE DANS LA DB
            $query = $db->prepare( "INSERT INTO users (username, email, password) VALUES ( :username, :email, :password)" );
            $qExec = $query->execute(array(
                'username' => $username,
                'email' => $mail,
                'password' => $password
            ));
            if($qExec != false)
            {
                echo "REGISTER:: Success";
            }
            //print_r($db->errorInfo());  
        }
        // SINON 
        else{
        echo "REGISTER:: Ce compte existe déjà";
        }
    }
    // SI CHAMPS OBLIGATOIRES PAS REMPLIS
    else{
        echo "REGISTER:: Les champs doivent être remplis";
    }
?>