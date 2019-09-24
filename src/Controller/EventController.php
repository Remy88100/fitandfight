<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{


    private $repository;

    public function __construct( EventRepository $repository)
    {
        $this->repository= $repository;
    }


    /**
     * @Route("/event", name="event.index")
     */
    public function index()
    {

        // $event= new event();
        // $event->settitle('course du club')
        //     ->setdescription ('dans la soirée du 15septembre');
            
        // $em= $this->getDoctrine()->getManager();

        // $em->persist($event);

        // $em->flush();

        $events= $this->repository->findall();
        return $this->render('event/index.html.twig', [
            'events' => $events,
            'current_menu' => 'event'
        ]);
    }
}
