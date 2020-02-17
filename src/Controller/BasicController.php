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

    public function Accueil(){
        if(!isset ($_SESSION['login'])){
            $_SESSION['errorlogin'] = "Veuillez-vous identifier";
            header('Location:/Login');
            return;
        }

        unset($_SESSION['errorlike']);
        return $this->twig->render(
            'accueil.html.twig'
        );
    }

}