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
    public function prestationsAction(EntityManagerInterface $entityManager)
    {
        // Création des instances de Prestation
        $prestation1 = new Prestations();
        $prestation1->setTitre("Prestation Luxury");
        $prestation1->setParagraphe("La formule Luxury est...");
        $prestation1->setPrix(50000);

        $prestation2 = new Prestations();
        $prestation2->setTitre("Prestation Prestige");
        $prestation2->setParagraphe("Une organisation de mariage complète...");
        $prestation2->setPrix(10000);

        $prestation3 = new Prestations();
        $prestation3->setTitre("Prestation Evasion");
        $prestation3->setParagraphe("La formule Evasion : l'organisation de votre mariage à l'étranger...");
        $prestation3->setPrix(6000);

        // Persister les objets dans la base de données
        $entityManager->persist($prestation1);
        $entityManager->persist($prestation2);
        $entityManager->persist($prestation3);
        $entityManager->flush();

    }
}
