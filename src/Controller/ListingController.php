<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListingController extends AbstractController
{
    #[Route('/listing', name: 'app_listing')]
    public function listing(Request $request, OfferRepository $offerRepository): Response
    {
        $wish = $request->get('search_form')['wish'];
        $lodgingId = (int) $request->get('search_form')['lodging'];
        $city = $request->get('search_form')['city'];

        $offers = $offerRepository->findBySearch($wish, $lodgingId, $city);

        return $this->render('listing/index.html.twig', [
            'offers' => $offers,
        ]);
    }
}
