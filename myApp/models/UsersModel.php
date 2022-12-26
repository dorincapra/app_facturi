<?php

class UsersModel extends DBModel
{
    protected $username;
    protected $name;
    protected $password;

    public function __construct($username='', $name='', $password=''){
        $this->name = $username;
        $this->name = $name;
        $this->password = $password;
    }


    public function isAuth($username, $password){
        $q = "SELECT * FROM `users` WHERE `username`= ? ";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("s", $username);
        $myPrep->execute();
        $result = $myPrep->get_result()->fetch_assoc();

        if($result){
            if(password_verify($password, $result['password'])){
                return true;
            }
            else return false;
        }
        else {
            return false;
        }
    }

    public function addUser($username, $name, $password, $type){
        $q = "INSERT INTO `users` (`name`, `username`, `password`, `tip`) VALUES (?, ?, ?, ?);";
        $myPrep = $this->db()->prepare($q);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $myPrep->bind_param("sssi", $username, $name, $hash, $type);
        return $myPrep->execute();
    }

    public function showUsers(){
        $q = "SELECT `name`, `username`, `tip`, `email`, `tel` FROM users";
        $result = $this->db()->query($q);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
   

     public function delUser($id){
        $q = "DELETE FROM `users_test` WHERE `id` = $id";
		$result = $this->db()->query($q);
        if($result) return true;
        else return false;
    }
}