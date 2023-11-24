<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfferController extends AbstractController
{
    #[Route('/offer/{id}', name: 'app_offer')]
    public function index(Request $request, OfferRepository $offerRepository): Response
    {
        $offer = $offerRepository->find($request->get('id'));

        return $this->render('offer/index.html.twig', [
            'offer' => $offer,
        ]);
    }
}
