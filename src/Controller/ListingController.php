<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\SearchDTO;
use App\Form\SearchDTOType;
use App\Repository\OfferRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListingController extends AbstractController
{
    #[Route('/listing', name: 'app_listing')]
    public function listing(
        Request $request,
        OfferRepository $offerRepository,
        PaginatorInterface $paginator
    ): Response {
        $dto = new SearchDTO();
        $form = $this->createForm(SearchDTOType::class, $dto);
        $form->handleRequest($request);

        // $offers = [];

        // if ($form->isSubmitted() && $form->isValid()) {
        //     $offers = $offerRepository->findBySearch($dto);
        // }

        $pagination = $paginator->paginate(
            $offerRepository->findBySearch($dto), /* query NOT result */
            $request->query->getInt('page', 1), /* page number */
            2 /* limit per page */
        );

        return $this->render('listing/index.html.twig', [
            // 'offers' => $offers,
            'pagination' => $pagination,
        ]);
    }
}
