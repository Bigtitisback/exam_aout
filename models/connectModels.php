<?php

    function getUser($username){
        // CONNECTION A LA DB AVEC PDO
        $db = dbConnect();

        $checkQuery =  "SELECT * FROM users WHERE username='".$username."'";
        $checkRes  = $db->query($checkQuery);
        $entry = $checkRes->fetchAll(PDO::FETCH_ASSOC);

        return $entry;
    }

    function checkUsers($username, $mail){
        // CONNECTION A LA DB AVEC PDO
        $db = dbConnect();
    
        $checkQuery = "SELECT * FROM users WHERE username='".$username."' OR email ='".$mail."'" ;
        $isChecked = $db->query($checkQuery);
        $entries = $isChecked->fetchAll(PDO::FETCH_ASSOC);
    
        return $entries;
    }

    function register($username, $mail, $password){
        $db = dbConnect();

        $query = $db->prepare( "INSERT INTO users (username, email, password) VALUES ( :username, :email, :password)" );
        $qExec = $query->execute(array(
            'username' => $username,
            'email' => $mail,
            'password' => $password
        ));
        return $qExec;
    }

    function dbConnect(){
        try{
            $db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
?>