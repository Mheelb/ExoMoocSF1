<?php

namespace App\Controller;

use App\Repository\PrestationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    #[Route('/acceuil', name: 'app_acceuil')]
    public function index(PrestationRepository $prestationRepository, UserRepository $userRepository): Response
    {

        $prestations = $prestationRepository->findPrestationWithLimitedNumber(10);
        $users = $userRepository->findUserWithLimitedNumber(1);

        return $this->render('acceuil/index.html.twig', [
            'prestations' => $prestations,
            'users' => $users
        ]);
    }
}
