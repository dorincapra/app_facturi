<?php

class ShowUsersController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {

        $user = new UsersModel;

        $result = $user->showUsers();

        $data["usersTableContent"] = "";

        if ($result) {
            foreach ($result as $user) {


              //translate level
              


                $data["usersTableContent"] .= "<tr class='bg-white even:bg-sky-50 border-b mx-20 text-neutral-900 hover:bg-neutral-100'>
                <td class='px-6 py-2 whitespace-nowrap'>" . $user['name'] . "</td>
                <td class='px-6 py-2 whitespace-nowrap'>" . $user['phone'] . "</td>
                <td class='px-6 py-2 whitespace-nowrap'>" . $user['email'] . "</td>
                <td class='px-6 py-2 whitespace-nowrap'>" . $user['level'] . "</td>
                <td class='px-6 py-2 whitespace-nowrap'>
                  <button type='button' class='bg-sky-100 px-3 rounded-md group'>
                    <i
                      class='fa-solid fa-pen-to-square text-sky-900 text-lg group-hover:text-orange-600 transition-all duration-150'
                    ></i>
                  </button>
                </td>
                <td class='px-6 py-2 whitespace-nowrap'>
                  <a href='?page=delUser&id=" .$user['id'] . "' type='button' class='bg-sky-100 px-3 rounded-md group'>
                    <i class='fa-sharp fa-solid fa-trash text-sky-900 text-lg
                    group-hover:text-orange-600 transition-all duration-150'
                  </a>
                </td>
              </tr>";
            }
        } else {
            $data["usersTableContent"] = "<tr><td>nu s-a gasit nici un user<td></tr>";
        }


        $content["content"] = $this->render(APP_PATH . VIEWS . 'userspage.html', $data);
        echo $this->render(APP_PATH . VIEWS . 'boilerplate.html', $content);
    }
}
