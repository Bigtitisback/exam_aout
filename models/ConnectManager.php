<?php
require_once("Manager.php");

class ConnectManager extends Manager{

    public function getUser($username){
        
        $db = $this->dbConnect();
    
        $checkQuery =  "SELECT * FROM users WHERE username='".$username."'";
        $checkRes  = $db->query($checkQuery);
        $entry = $checkRes->fetchAll(PDO::FETCH_ASSOC);
    
        return $entry;
    }
    
    public function checkUsers($username, $mail){
        
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