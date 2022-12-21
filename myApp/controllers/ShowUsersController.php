<?php

class ShowUsersController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        $user = new UsersModel;

        $result = $user->showUsers();

        $data["usersTableContent"] = "";

        // if($result){
        //     foreach($result as $user){
        //         $data["usersTableContent"].= "<tr><td>" . $user["name"] . "</td><td>" . $user["username"] . "</td></tr>";
        //     }
        // }
        $data["content"] = $this->render(APP_PATH.VIEWS.'userspage.html');
        echo $this->render(APP_PATH.VIEWS.'boilerplate.html',$data);


    }

}