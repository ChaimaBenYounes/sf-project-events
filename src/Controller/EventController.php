<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Event;

class EventController extends AbstractController
{
    
    public function event()
    {
        $em = $this->getDoctrine()->getManager();

        $event = new Event();

        $event->setName('Conference Laravel');
        $event->setPric(3.5);
        $event->setDate(new \Datetime());
        $event->setDescription('Conference sur les notions fond de Laravel');
        $event->setLocalisation('paris');

        $em->persist($event);
        $em->flush();

       $em->remove($event);
       
       return new Response('Saved new product with id => '.$event->getId());
    }

    public function showAllEvent(){

        $em = $this->getDoctrine()->getManager();
        $eventRepository = $em->getRepository(Event::class)->recup();

        return $this->render('event/event.html.twig', [
            'eventRepository' => $eventRepository
        ]);
    
    }
    
    public function showFiveEvent(){

        $em = $this->getDoctrine()->getManager();
        $showFiveEvent = $em->getRepository(Event::class)->lastFiveEvent();

        return $this->render('event/event.html.twig', [
            'showFiveEvent' => $showFiveEvent
        ]);
    
    }

    public function showfistAndLastEvent(){

        $em = $this->getDoctrine()->getManager();
        $showfistAndLastEvent = $em->getRepository(Event::class)->fistAndLastEvent();

        return $this->render('event/event.html.twig', [
            'showfistAndLastEvent' => $showfistAndLastEvent
        ]);
    
    }

    /*public function showAllEvent(){

        $em = $this->getDoctrine()->getManager();
        $eventRepository = $em->getRepository(Event::class)->findAll();

        return $this->render('event/event.html.twig', [
            'eventRepository' => $eventRepository
        ]);
    
    }*/

    public function deletEvent(Event $event){

        $em = $this->getDoctrine()->getManager();
        //$event = $em->getRepository(Event::class)->find($id);

        if (!$event) {
            throw $this->createNotFoundException(
                'No event found for id '.$event->getId()
            );
        }
        
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute('show-all-event');
    
    }

    public function updateEvent(Event $event){

        $em = $this->getDoctrine()->getManager();
        //$eventR = $em->getRepository(Event::class)->find($id);

        if (!$event) {
            throw $this->createNotFoundException(
                'No event found for id '.$event->getId()
            );
        }

        $event->setName('Conference Laravel (update)');
        $event->setPric(36.5);
        $event->setDate(new \Datetime());
        $event->setDescription('Conference sur les notions fond de Laravel (update)');
        $event->setLocalisation('nice');

        $em->flush();
    

        return $this->redirectToRoute('show-all-event');
    
    }
}
