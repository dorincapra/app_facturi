<?php

class AddUserController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {

        $userName = $_POST["userName"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $level = $_POST["level"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];

        $user = new UsersModel();



        if ($user->addUser($name, $userName, $email, $phone, $password, $level)) {
            //show "userul a fost adaugat cu success" for 3 sec 
            //then redirect to "Users" page
            echo "a mers";
        } else {
            //show "userul NU a fost adaugat, contacteaza developerul" for 3 sec 
            //then redirect to "Users" page
            echo "n-a mers";
        }

    }
}
