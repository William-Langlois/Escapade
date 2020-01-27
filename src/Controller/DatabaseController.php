<?php


namespace src\Controller;

use src\Model\User;
use src\Model\Bdd;
use DateTime;

class DatabaseController extends AbstractController
{
    public function Index()
    {
        return $this->DispAll();
    }

    public function DispAll()
    {
        $user = new User();
        $listUser = $user->SqlGetAll(Bdd::GetInstance());
        return $this->twig->render(
            'Database/dispall.html.twig', [
                'userList' => $listUser
            ]
        );
    }

}