<?php

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class mainController extends Controller
{
    public function indexAction()
    {
        return $this->render('TroiswaBackBundle:main:index.html.twig');
    }
}