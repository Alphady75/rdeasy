<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FaqsController extends AbstractController
{
    #[Route('/faqs', name: 'faqs')]
    public function faqs(): Response
    {
        return $this->render('faqs/index.html.twig', [
            
        ]);
    }
}
