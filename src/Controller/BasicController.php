<?php
namespace src\Controller;

class BasicController extends AbstractController {

    public function Index(){
        return $this->WelcomePage();
    }

    public function WelcomePage(){
        return $this->twig->render(
            'welcomepage.html.twig'
        );
    }

}