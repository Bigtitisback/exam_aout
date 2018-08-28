<?php

    function getUser(){
        // CONNECTION A LA DB AVEC PDO
        $db = dbConnect();

        $checkQuery =  "SELECT * FROM users WHERE username='".$username."'";
        $checkRes  = $db->query($checkQuery);
        $entry = $checkRes->fetchAll(PDO::FETCH_ASSOC);

        return $entry;
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