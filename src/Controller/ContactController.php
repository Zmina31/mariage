<?php

namespace App\Controller;

use App\Entity\Evenements;
use App\Entity\Utilisateurs;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $event = new Evenements();
        $form = $this->createForm(ContactType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = new Utilisateurs();
            $user->setNom($form->get("nom")->getData());

            $entityManager->persist($event);
            $entityManager->flush();


        }
        return $this->render('contact/index.html.twig', [
            'form' => $form,
        ]);
    }

}
