<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\SearchFormType;
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
        $form = $this->createForm(SearchFormType::class);
        $form->handleRequest($request);

        $offers = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $wish = $form->getData()['wish'];
            $city = $form->getData()['city'];
            $logings = $form->getData()['lodging'];

            $lodgingIdChoices = [];
            foreach ($logings as $lodging) {
                $lodgingIdChoices[] = $lodging->getId();
            }

            $offers = $offerRepository->findBySearch($wish, $lodgingIdChoices, $city);
        }

        return $this->render('listing/index.html.twig', [
            'offers' => $offers,
        ]);
    }
}
