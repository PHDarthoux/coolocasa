<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\LodgingType;
use App\Form\SearchFormType;
use App\Repository\LodgingTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(Request $request, LodgingTypeRepository $lodgingTypeRepository): Response
    {
        $searchForm = $this->createForm(SearchFormType::class);

        return $this->render('search/_search.html.twig', [
            'searchForm' => $searchForm,
        ]);
    }
}
