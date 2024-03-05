<?php
require_once './../Controller/UserController.php';
class MainController
{
    public function getMain(): void
    {

        $user = new UserController();
        $user->checkUser();

        require_once './../View/main.php';
    }

}