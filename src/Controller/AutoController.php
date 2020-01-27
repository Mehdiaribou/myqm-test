<?php

namespace App\Controller;

use App\Entity\Auto;
use App\Form\AutoType;
use App\Entity\AutoBrand;
use App\Repository\AutoRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AutoController extends AbstractController
{

    
    /**
     * @Route("/", name="homeauto")
     */
    public function index(AutoRepository $repo)
    {
        $autos = $repo->findAll();

        return $this->render('auto/index.html.twig', [
            'autos' => $autos
        ]);
    }

    /**
     * Permet de créer une auto
     *
     * @Route("/auto/new", name="newauto")
     * 
     * @return Response
     */
    public function create(Request $request){
         
        
        $auto = new Auto();
        $form = $this->createForm(AutoType::class, $auto);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($auto);
            $this->getDoctrine()->getManager()->flush();
            $id = $auto->getId();

            $this->addFlash(
                'success',
                "L'auto <strong>{$auto->getName()}</strong> a bien été enregistrée !"
            );
             return $this->redirectToRoute('showauto',[
            'id' => $id]);
        }

        return $this->render('auto/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
     /**
     * Permet d'afficher le formulaire d'édition
     *
     * @Route("/auto/{id}/edit", name="auto_edit")
     * 
     * @return Response
     */
    public function edit(Auto $auto, Request $request){

        $form = $this->createForm(AutoType::class, $auto);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
             
            $this->getDoctrine()->getManager()->persist($auto);
            $this->getDoctrine()->getManager()->flush();
            $id = $auto->getId();

            $this->addFlash(
                'success',
                "Les modifications de l'annonce <strong>{$auto->getName()}</strong> ont bien été enregistrées !"
            );

            return $this->redirectToRoute('showauto',[
                'id' => $id]);
        }

        return $this->render('auto/edit.html.twig', [
            'form' => $form->createView(),
            'auto' => $auto
        ]);
    }

     
      /**
     * Permet d'afficher une seule auto
     *
     * @Route("/auto/{id}", name="showauto")
     * 
     * @return Response
     */
    public function show(Auto $auto){
        return $this->render('auto/show.html.twig', [
            'auto' => $auto
        ]);
    }
/**
     * Permet de supprimer une auto
     * 
     * @Route("/auto/{id}/delete", name="auto_delete")
     *
     * @param Auto $auto
     * @param ObjectManager $manager
     * @return Response
     */
    public function delete(Auto $auto, ManagerRegistry $manager) {
       
        $this->getDoctrine()->getManager()->remove($auto);
        $this->getDoctrine()->getManager()->flush();

        $this->addFlash(
            'success',
            "L'auto <strong>{$auto->getName()}</strong> a bien été supprimée !"
        );

        return $this->redirectToRoute("homeauto");
    }


    
    
}


