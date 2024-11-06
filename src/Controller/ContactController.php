<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, MailerService $mailerService): Response
    {
        $form = $this->createForm(ContactType::class, [], []);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            # Send mail to admin
            $mailerService->sendContact(
                $form->get('nom')->getData(),
                $form->get('email')->getData(),
                $form->get('sujet')->getData(),
                $form->get('message')->getData()
            );

            $this->addFlash('success', "Votre message a bien été envoyer");

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
