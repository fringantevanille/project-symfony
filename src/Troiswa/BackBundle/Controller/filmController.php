<?php
/**
 * Created by PhpStorm.
 * User: wap14
 * Date: 29/01/15
 * Time: 17:07
 */
namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Troiswa\BackBundle\Entity\movie;


class filmController extends Controller
{
    public function indexAction()
    {
        $film = $this->getDoctrine()->getRepository('TroiswaBackBundle:movie')->findAll();

        return $this->render('TroiswaBackBundle:movie:film.html.twig', ['film' => $film]);
    }

    public function showAction($id)
    {
        $film = $this->getDoctrine()->getRepository('TroiswaBackBundle:movie')->find($id);

        return $this->render('TroiswaBackBundle:movie:one_film.html.twig', ['film' => $film]);
    }

    public function AjoutAction(Request $request)
    {
        $film = new movie();
        //$acteur -> setPrenom("ludo");
        $formulaire = $this->createFormBuilder($film)
            ->add("titre","text")
            ->add("description","text")
            ->add("dateDeSortie","datetime")
            ->add("fichier","file")
            ->add("duree")
            ->add("note")
            ->add("save","submit")
            ->getForm();

        //if ("POST" == $request->getMethod())
        //{
        $formulaire->handleRequest($request);

        //  $formulaire->bind($request);
        if ($formulaire -> isvalid())
        {
            $film->upload();
            $em = $this->getDoctrine()->getManager();
            // à partir du moment ou il connait l'objet, il ne vient pas d'être créer
            $em->persist($film);
            // enregistremt en BDD
            $em->flush();
        }

        return $this->render('TroiswaBackBundle:movie:Add_film.html.twig',["formulaire"=>$formulaire->createView()]);
    }

    public function EditerAction($id, Request $request)
    {
        $film = $this->getDoctrine()->getRepository("TroiswaBackBundle:movie")->find($id);
        //$acteur -> setPrenom("ludo");
        $formulaire = $this->createFormBuilder($film)
            ->add("prenom","text")
            ->add("nom","text")
            ->add("sexe","choice" , array(
                "choices" => array(
                    0 => 'homme', 1 => 'femme'),
                "expanded"=>true) )
            ->add("biographie","textarea")
            ->add("dateNaissance","text")
            ->add("signe_astro","text")
            ->add("save","submit")
            ->getForm();

        //if ("POST" == $request->getMethod())
        //{
        $formulaire->handleRequest($request);

        //  $formulaire->bind($request);
        if ($formulaire -> isvalid())
        {
            $em = $this->getDoctrine()->getManager();
            // à partir du moment ou il connait l'objet, il ne vient pas d'être créer
            $em->persist($film);
            // enregistremt en BDD
            $em->flush();
        }

        return $this->render('TroiswaBackBundle:movie:editer.html.twig',["formulaire"=>$formulaire->createView()]);
    }


}
