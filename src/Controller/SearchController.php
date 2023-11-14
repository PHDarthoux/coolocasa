<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\SearchDTO;
use App\Form\SearchDTOType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(
        RequestStack $requestStack,
    ): Response {
        $searchDTO = new SearchDTO();
        $searchForm = $this->createForm(SearchDTOType::class, $searchDTO);

        $searchForm->handleRequest($requestStack->getMainRequest());

        return $this->render('search/_search.html.twig', [
            'searchForm' => $searchForm,
        ]);
    }
}
