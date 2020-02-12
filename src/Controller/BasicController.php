<?php
namespace src\Controller;

class BasicController extends AbstractController {

    public function Index(){
        return $this->WelcomePage();
    }

    public function WelcomePage(){
        unset($_SESSION['errorlike']);
        return $this->twig->render(
            'welcomepage.html.twig'
        );
    }

}