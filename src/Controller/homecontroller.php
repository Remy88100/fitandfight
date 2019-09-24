<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use App\Entity\Activite;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use App\Repository\ActiviteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class homecontroller extends AbstractController{

    private $repository;

    public function __construct( ActiviteRepository $repository)
    {
        $this->repository= $repository;
    }

    public function home()
    {
        return $this-> render('pages/index.html.twig', [
            
        ]);
    }

        /**
     * @Route("/pages", name="pages.activites")
     */
    public function activites(){

                $activites= new Activite();
        // $activite->settitle('boxthai')
        //          ->setfilename ('/photos/test.jpg');
            
        // $em= $this->getDoctrine()->getManager();

        // $em->persist($activite);

        // $em->flush();
        $activites= $this->repository->findall();
        return $this-> render('pages/activites.html.twig',[
            'activites' => $activites,
            'current_menu' => 'activites']);
    }

    /**
     * @Route("/show/{slug}-{id}", name="activite.show", requirements={"slug": "[a-z0-9\-]*"} )
     */
    public function show(Activite $activite ,string $slug) 
        {
           
            if($activite->getSlug() !== $slug)
            {
                return $this->redirectToRoute('activite.show', [
                    'id' => $activite->getId(),
                    'slug' => $activite->getSlug()
                ], 301);
            }
            return $this->render('pages/activite/show.html.twig',[
               'activite' => $activite 
            ]);
        }


    /**
 * @Route("pages/contact", name="pages.contact")
 */
public function contact(Request $request, ContactNotification $mailer)

    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())

        {
                $mailer->notify($contact);
                $this->addFlash('success', "Email envoyé avec succès");
                return $this->redirectToRoute('pages.contact', [
                    'current_menu' =>'contact' 
                ]);
        }


        return $this->render('pages/contact.html.twig',
        [ 'current_menu' =>'contact',
          'form' =>$form->createView()]);
    }

    /**
     * @Route("photos/photo", name="photos.photo")
     */
    public function photo(){

        return $this-> render('photos/photo.html.twig', [
            'current_menu' => 'photos'
        ]);
    }


/**
 * @Route("/document", name="document.index")
 */

  public function document(){
     return $this-> render('document/index.html.twig', [
         'current_menu' => 'document'
     ]);
 }

/**
 * @Route("document/download1", name="document.download1")
 */
    public function downloadAction(){
    // {
    //     $pdfPath = $this->getParameter('dir.downloads').'/public/images/activites/cv.pdf';

    //     return $this->file($pdfPath, 'sample.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    // }

    $file = 'images/activites/documents/majeur.pdf';
    $response = new BinaryFileResponse($file);
    BinaryFileResponse::trustXSendfileTypeHeader();
    ResponseHeaderBag::DISPOSITION_INLINE;
    return $response ;
    
}
/**
 * @Route("document/download2", name="document.download2")
 */
public function downloadMineur(){
    // {
    //     $pdfPath = $this->getParameter('dir.downloads').'/public/images/activites/cv.pdf';

    //     return $this->file($pdfPath, 'sample.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    // }

    $file = 'images/activites/documents/mineur.pdf';
    $response = new BinaryFileResponse($file);
    BinaryFileResponse::trustXSendfileTypeHeader();
    ResponseHeaderBag::DISPOSITION_INLINE;
    return $response ;
    }
    /**
 * @Route("document/download3", name="document.download3")
 */
public function reglement(){
    // {
    //     $pdfPath = $this->getParameter('dir.downloads').'/public/images/activites/cv.pdf';

    //     return $this->file($pdfPath, 'sample.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    // }

    $file = 'images/activites/documents/règlement.pdf';
    $response = new BinaryFileResponse($file);
    BinaryFileResponse::trustXSendfileTypeHeader();
    ResponseHeaderBag::DISPOSITION_INLINE;
    return $response ;
}

        /**
     * @Route("pages/mentionslegales", name="pages.mentionslegales")
     */
    public function mentionslegales(){

        return $this-> render('pages/mentionslegales.html.twig', [
           
        ]);
    }
}
