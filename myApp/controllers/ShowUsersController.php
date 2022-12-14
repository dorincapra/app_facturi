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

        if($result){
            foreach($result as $user){
                $data["usersTableContent"].= "<tr><td>" . $user["name"] . "</td><td>" . $user["userName"] . "</td></tr>";
            }
        }
        echo $this->render(APP_PATH.VIEWS.'showUsersLayout.html', $data);


    }

}