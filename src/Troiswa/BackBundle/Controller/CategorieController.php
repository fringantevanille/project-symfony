<?php
/**
 * Created by PhpStorm.
 * User: wap14
 * Date: 29/01/15
 * Time: 13:19
 */

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CategorieController extends Controller
{
    public function indexAction()
    {
        $categories = $this->getDoctrine()->getRepository('TroiswaBackBundle:categorie')->findAll();

        return $this->render('TroiswaBackBundle:Categorie:index.html.twig', ['categories' => $categories]);
    }

}