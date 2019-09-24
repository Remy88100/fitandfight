<?php


namespace App\Controller\Admin;

use App\Entity\Member;
use App\Form\MemberType;
use App\Repository\MemberRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminMemberController extends AbstractController
{

    

        private $repository;
        private $em;
        
       
        public function __construct(MemberRepository $repository, ObjectManager $em)

        {
            $this->repository = $repository;
            $this->em = $em;
        }

    /**
     *  @Route("/admin/membre", name="Admin.membre.index")
     */
    public function index()
    {
        $membres = $this->repository->findAll();

        return $this->render('Admin/membre/index.html.twig', [
            'current_menu' => 'admin',
            'membres' => $membres
        ]);
    }

    /**
 *@Route("/admin/membre/new", name="Admin.membre.new")
 */
public function new(Request $request)
{
    $membre= new Member();
    $form = $this->createForm(MemberType::class, $membre);   
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid())
    {
        $this->em->persist($membre);
        $this->em->flush();
        $this->addFlash('success', 'Membre créé avec succès');
        return $this->redirectToRoute('Admin.membre.index');

    }

return $this->render('Admin/membre/new.html.twig',[
    'membre' => $membre,
    'form' => $form->createView()
]);
}


 /**
  *  @Route("/admin/membre/{id}", name="Admin.membre.edit")
  */
    public function edit(Member $membre, Request $request)
    {
            $form = $this->createForm(MemberType::class, $membre);
            
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid())
            {
                $this->em->flush();
                $this->addFlash('success', 'Membre modifié avec succès');
                return $this->redirectToRoute('Admin.membre.index');

            }

        return $this->render('Admin/membre/edit.html.twig',[
            'membre' => $membre,
            'form' => $form->createView()
        ]);
    }

/**
     * @Route("/admin/membre/show/{id}", name="Admin.membre.show" )
     */
    public function show(Member $membre, Request $request) 
        {
            $form = $this->createForm(MemberType::class, $membre);
            
            $form->handleRequest($request);
            
            return $this->render('admin/membre/show.html.twig',[
               'membre' => $membre,
               'form' => $form->createView() 
            ]);
        }

}