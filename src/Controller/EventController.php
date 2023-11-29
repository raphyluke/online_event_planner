<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Events;
use App\Form\EventType;
use Doctrine\ORM\EntityManagerInterface;

class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $newEvent = new Events();
        // Create a new event form
        $form = $this->createForm(EventType::class, $newEvent);

        // Handle the request
        $form->handleRequest($request);

        $newEvent->setOrganizerID(1);

        if ($form->isSubmitted() && $form->isValid()) {
            $newEvent = $form->getData();

            // Save the new event to the database
            $entityManager->persist($newEvent);
            $entityManager->flush();
        }

        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
            'form' => $form->createView(),
        ]);
    }
}
