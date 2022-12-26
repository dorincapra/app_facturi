<?php

class AddUserController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {

        $username = $_POST["username"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $type = $_POST["type"];

        $user = new UsersModel();



        if ($user->addUser($username, $name, $password, $type)) {
            //show "userul a fost adaugat cu success" for 3 sec 
            //then redirect to "Users" page
            return true;
        } else {
            //show "userul NU a fost adaugat, contacteaza developerul" for 3 sec 
            //then redirect to "Users" page
        }
    }
}
