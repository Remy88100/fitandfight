<?php


namespace App\Controller\Admin;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use App\Entity\Activite;
use App\Form\ActiviteType;
use App\Repository\ActiviteRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

Class AdminPropertyController extends AbstractController
 {
    private $repository;
    private $em;
    private $repositorye;
    private $eme;
   
    public function __construct(EventRepository $repository, ObjectManager $em, ActiviteRepository $repositorye, ObjectManager $eme)

    {
        $this->repository = $repository;
        $this->em = $em;

        $this->repositorye = $repositorye;
        $this->eme = $eme;
    }

    /**
     * @Route("/admin", name="Admin.property.index")
     */
    public function index(){

        $events = $this->repository->findAll();

        return $this->render('admin/property/index.html.twig', [
            'current_menu' => 'admin',
            'events' => $events
        ]);

    }

        /**
 * @Route("/Admin/property/create", name="Admin.property.create")
 */
public function new(Request $request)
{
    $event= new Event();
    $form = $this->createForm(EventType::class, $event);   
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid())
    {
        $this->em->persist($event);
        $this->em->flush();
        $this->addFlash('success', 'Evénement créé avec succès');
        return $this->redirectToRoute('Admin.property.index');

    }

return $this->render('Admin/property/create.html.twig',[
    'event' => $event,
    'form' => $form->createView()
]);
}

    /**
     * @Route("/admin/activite", name="Admin.activite.indexe")
     */
    public function indexe(){

        $activites = $this->repositorye->findAll();

        return $this->render('Admin/activite/indexe.html.twig', [
            'current_menu' => 'admin',
            'activites' => $activites
        ]);

    }


     /**
  *  @Route("/Admin/property/{id}", name="Admin.property.edit")
  */
  public function edit(Event $event, Request $request)
  {
          $form = $this->createForm(EventType::class, $event);
          
          $form->handleRequest($request);

          if($form->isSubmitted() && $form->isValid())
          {
              $this->em->flush();
              $this->addFlash('success', 'Event modifié avec succès');
              return $this->redirectToRoute('Admin.property.index');

          }

      return $this->render('Admin/property/edit.html.twig',[
          'event' => $event,
          'form' => $form->createView()
      ]);
}

 /**
  *  @Route("/Admin/activite/{id}", name="Admin.activite.edite")
  */
  public function edite(Activite $activite, Request $request)
  {
          $form = $this->createForm(ActiviteType::class, $activite);
          
          $form->handleRequest($request);

          if($form->isSubmitted() && $form->isValid())
          {
              $this->em->flush();
              $this->addFlash('success', 'Activité modifiée avec succès');
              return $this->redirectToRoute('Admin.activite.indexe');

          }

      return $this->render('Admin/activite/edite.html.twig',[
          'activite' => $activite,
          'form' => $form->createView()
      ]);
}



 }