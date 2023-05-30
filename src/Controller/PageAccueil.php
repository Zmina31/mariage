<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageAccueil extends AbstractController
{
    #[Route('/page', name: 'page_home')]
    public function home()
    {
        echo "coucou";
        die();
    }

    #[Route('/test', name: 'page_test')]
    public function test()
    {
        echo "test";
        die();
    }
}