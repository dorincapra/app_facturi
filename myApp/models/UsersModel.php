<?php

class UsersModel extends DBModel
{
    protected $userName;
    protected $name;
    protected $password;

    public function __construct($userName='', $name='', $password=''){
        $this->name = $userName;
        $this->name = $name;
        $this->password = $password;
    }


    public function isAuth($userName, $password){
        $q = "SELECT * FROM `users` WHERE `userName`= ? ";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("s", $userName);
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

    public function addUser($userName, $name, $password, $type){
        $q = "INSERT INTO `users` (`name`, `userName`, `password`, `tip`) VALUES (?, ?, ?, ?);";
        $myPrep = $this->db()->prepare($q);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $myPrep->bind_param("sssi", $userName, $name, $hash, $type);
        return $myPrep->execute();
    }

    public function showUsers(){
        $q = "SELECT `name`, `userName` FROM users";
        $result = $this->db()->query($q);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
   

    // public function getDetails(){
    //     return $this->name . ' are emailul '. $this->email
    //             .' și parola '.$this->password;
    // }

   

    // public function delUser($id){
    //     $q = "DELETE FROM `users_test` WHERE `id` = $id";
	// 	$result = $this->db()->query($q);
    //     if($result) return true;
    //     else return false;
    // }

    // public function addUser($user, $pass){
    //     $hash = password_hash($pass, PASSWORD_DEFAULT);
    //     $q = "INSERT INTO `users_test`(`userName`, `userEmail`, `userPass`, `hashedPass`) VALUES (?, ?, ?, ?);";
    //     // prepared statements
    //     $myPrep = $this->db()->prepare($q);
    //     // s - string, i - integer, d - double, b - blob
    //     $email = 'generic@gmail.com';
    //     $myPrep->bind_param("ssss", $user, $email, $pass, $hash);

    //     return $myPrep->execute();
    //     // $result->fetch_all(MYSQLI_ASSOC);
    //     // $myPrep->get_results()->fetch_all(MYSQLI_ASSOC);
    //     // $myPrep->close();
    // }

 

    // public function tabel($myUsers){
    //     $output = '';
    //     if(is_array($myUsers)){
    //         $output .= '<table class="table table-striped"><tr>';
    //         foreach(array_keys($myUsers[0]) as $key){
    //             $output .= '<th>'.$key.'</th>';
    //         }
    //         $output .= '</tr>';
        
    //         foreach($myUsers as $user){
    //             $id = $user['id']; 
    //             $output .= '<tr>';
    //             foreach($user as $value){
    //                 $output .= '<td>'.$value.'</td>';
    //             }
    //             // echo "<td><a href='delete.php?id=$id'>DELETE</a></td>";
    //             $output .= "<td>
    //                 <form action='delete.php'>
    //                     <button class='btn btn-danger' name='delete' value='$id'>DELETE</button>    
    //                 </form></td>";
    //                 $output .= '</tr>';
    //         }
    //         $output .= '</table>';
    //     }
    //     return $output;
    // }

}