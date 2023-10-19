<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(OfferRepository $offerRepository): Response
    {
        $lastOffers = $offerRepository->findBy([], ['createdAt' => 'DESC'], 5);

        return $this->render('accueil/index.html.twig', [
            'lastOffers' => $lastOffers,
        ]);
    }
}
