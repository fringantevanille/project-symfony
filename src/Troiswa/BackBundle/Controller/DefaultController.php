<?php

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TroiswaBackBundle:Default:index.html.twig', array('name' => $name));
    }

    public function testAction()
    {
        $age = 18;
        $prenom = "isa";
        $acteurs = [
            ["prenom"=>"Bruce","nom"=>"WILLIS","age"=>"59","signe"=>"poisson"],
            ["prenom"=>"Tom","nom"=>"CRUISE","age"=>"52","signe"=>"cancer"]
        ];

        return $this->render('TroiswaBackBundle:Default:test.html.twig', array('firstname'=>$prenom,"myAge"=>$age,"allActeurs"=>$acteurs));
    }

    public function prenomAction()
    {

        return $this->render("TroiswaBackBundle:Default:prenom.html.twig");
    //                               |             |           |
    //                         nom du bundle       |           |
    //                                      dossier ds views   |
    //                                                   fichier ds default
    }

    public function themeAction()
    {
        return $this->render('TroiswaBackBundle:Default:theme.html.twig');
    }
}