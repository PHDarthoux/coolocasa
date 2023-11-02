<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\SearchFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(): Response
    {
        $searchForm = $this->createForm(SearchFormType::class);

        return $this->render('search/_search.html.twig', [
            'searchForm' => $searchForm,
        ]);
    }
}
