<?php
require("Manager.php");

class ConnectManager extends Manager{

    public function getUser($username){
        // CONNECTION A LA DB AVEC PDO
        $db = $this->dbConnect();
    
        $checkQuery =  "SELECT * FROM users WHERE username='".$username."'";
        $checkRes  = $db->query($checkQuery);
        $entry = $checkRes->fetchAll(PDO::FETCH_ASSOC);
    
        return $entry;
    }
    
    public function checkUsers($username, $mail){
        // CONNECTION A LA DB AVEC PDO
        $db = $this->dbConnect();
    
        $checkQuery = "SELECT * FROM users WHERE username='".$username."' OR email ='".$mail."'" ;
        $isChecked = $db->query($checkQuery);
        $entries = $isChecked->fetchAll(PDO::FETCH_ASSOC);
    
        return $entries;
    }
    
    public function register($username, $mail, $password){
        $db = $this->dbConnect();
    
        $query = $db->prepare( "INSERT INTO users (username, email, password) VALUES ( :username, :email, :password)" );
        $qExec = $query->execute(array(
            'username' => $username,
            'email' => $mail,
            'password' => $password
        ));
        return $qExec;
    }
}

?>