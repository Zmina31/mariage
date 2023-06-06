<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationsController extends AbstractController
{
    #[Route('/prestations', name: 'prestations_list')]
    public function list(): Response
    {

        return $this->render('prestations/list.html.twig', [

        ]);
    }
    #[Route('/prestations/details/{id}', name: 'prestations_details')]
    public function details(int $id): Response
    {
        //todo: aller chercher la prestation dans la bdd

        return $this->render('prestations/details.html.twig', [

        ]);
    }
}
