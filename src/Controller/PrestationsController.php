<?php

namespace App\Controller;

use App\Entity\Prestations;
use App\Form\PrestationsType;
use App\Repository\PrestationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationsController extends AbstractController
{
    #[Route('/prestations', name: 'prestations_list')]
    public function list(PrestationsRepository $prestationsRepository): Response
    {
        $prestations = $prestationsRepository->findAll();


        return $this->render('prestations/list.html.twig', [
            "prestations" => $prestations
        ]);
    }

    #[Route('/prestations/details/{id}', name: 'prestations_details')]
    public function details(int $id, PrestationsRepository $prestationsRepository): Response
    {
        $prestation = $prestationsRepository->find($id);

        return $this->render('prestations/details.html.twig', [
            "prestation" => $prestation
        ]);
    }

    #[Route('/prestations/create', name: 'prestations_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prestations = new Prestations();
        $prestationForm = $this->createForm(PrestationsType::class, $prestations);

        $prestationForm->handleRequest($request);

        if ($prestationForm->isSubmitted() && $prestationForm->isValid()) {

            $entityManager->persist($prestations);
            $entityManager->flush();

        }
        return $this->render('prestations/create.html.twig', [
            'prestationForm' => $prestationForm->createView()

        ]);
    }
}
