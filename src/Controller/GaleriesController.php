<?php

namespace App\Controller;

use App\Entity\Photos;
use App\Repository\PhotosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GaleriesController extends AbstractController
{
    #[Route('/galeries', name: 'app_galeries')]
    public function photos(PhotosRepository $photosRepository, EntityManagerInterface $entityManager): Response
    {
        // Chemins d'accès des photos à insérer
        $cheminsImg = [
            'img/posters/mariage1.jpg',
            'img/posters/mariage2.jpg',

        ];

        foreach ($cheminsImg as $cheminImg) {
            $photo = new Photos();
            $photo->setNom('Mariee');
            $photo->setCheminImg($cheminImg);

            $entityManager->persist($photo);
        }

        $entityManager->flush();

        // Récupération de toutes les photos depuis la base de données
        $photos = $photosRepository->findAll();

        return $this->render('galeries/index.html.twig', [
            'photos' => $photos,
        ]);
    }
}
