<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageAccueil extends AbstractController
{
    #[Route('/', name: 'page_home')]
    public function home()
    {
        return $this->render('page/home.html.twig');
    }

}