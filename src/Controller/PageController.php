<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/page')]
class PageController extends AbstractController
{
    #[Route('/politique-de-confidentialite', name: 'page_politique')]
    public function politiques(): Response
    {
        return $this->render('page/politique.html.twig', []);
    }

    #[Route('/conditions-generale-vente-et-utilisation', name: 'page_conditions')]
    public function conditions(): Response
    {
        return $this->render('page/cgv.html.twig', []);
    }

    #[Route('/mentions', name: 'mentions')]
    public function mentions(): Response
    {
        return $this->render('page/mentions.html.twig', []);
    }

    #[Route('/mentions-legales', name: 'page_mentions')]
    public function mentionsLegales(): Response
    {
        return $this->render('page/mentions.html.twig', []);
    }

    #[Route('/chauffeur', name: 'page_chauffeur')]
    public function chauffeur(): Response
    {
        return $this->render('page/chauffeur.html.twig', []);
    }

    #[Route('/passager', name: 'page_passager')]
    public function passager(): Response
    {
        return $this->render('page/passager.html.twig', []);
    }
}
