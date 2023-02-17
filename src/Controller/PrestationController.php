<?php

namespace App\Controller;

use App\Entity\Prestation;
use App\Form\PrestationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ObjectManager;

class PrestationController extends AbstractController
{
    #[Route('/prestation', name: 'app_prestation')]
    public function index(Request $request, ObjectManager $manager): Response
    {
        $prestation = new Prestation();
        $form = $this->createForm(PrestationType::class, $prestation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($prestation);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre prestation a été ajoutée'
            );

            return $this->redirectToRoute('app_acceuil');
        }

        return $this->render('prestation/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
