<?php

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Troiswa\BackBundle\Entity\Acteur;
use Troiswa\BackBundle\Form\ActeurType;


class ActeurController extends Controller
{
    public function indexAction()
    {
        $acteurs = $this->getDoctrine()->getRepository('TroiswaBackBundle:Acteur')->findAll();

        return $this->render('TroiswaBackBundle:Acteur:index.html.twig', ['acteurs' => $acteurs]);
    }

    public function showAction($id)
    {
        $acteur = $this->getDoctrine()->getRepository('TroiswaBackBundle:Acteur')->find($id);

        return $this->render('TroiswaBackBundle:Acteur:show.html.twig', ['Acteur' => $acteur]);
    }

    public function AjoutAction(Request $request)
    {
        $acteur = new Acteur();
        //$acteur -> setPrenom("ludo");
        $formulaire = $this->createForm(new ActeurType(), $acteur)
            ->add("save","submit");

       //if ("POST" == $request->getMethod())
       //{
        $formulaire->handleRequest($request);

         //  $formulaire->bind($request);
           if ($formulaire -> isvalid())
           {
               $em = $this->getDoctrine()->getManager();
               // à partir du moment ou il connait l'objet, il ne vient pas d'être créer
               $em->persist($acteur);
               // enregistremt en BDD
               $em->flush();
           }

        return $this->render('TroiswaBackBundle:Acteur:Ajout.html.twig',["formulaire"=>$formulaire->createView()]);
    }

    public function EditerAction($id, Request $request)
    {
        $acteur = $this->getDoctrine()->getRepository("TroiswaBackBundle:Acteur")->find($id);
        //$acteur -> setPrenom("ludo");
        $formulaire = $this->createForm(new ActeurType(), $acteur)
            ->add("save","submit");

        //if ("POST" == $request->getMethod())
        //{
        $formulaire->handleRequest($request);

        //  $formulaire->bind($request);
        if ($formulaire -> isvalid())
        {
            $em = $this->getDoctrine()->getManager();
            // à partir du moment ou il connait l'objet, il ne vient pas d'être créer
            $em->persist($acteur);
            // enregistremt en BDD
            $em->flush();
        }

        return $this->render('TroiswaBackBundle:Acteur:editer.html.twig',["formulaire"=>$formulaire->createView()]);
    }
}