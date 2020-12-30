<?php

namespace App\Controller;
use App\Form\BijouxType;
use App\Entity\Bijoux;
use App\Entity\Contact;
use App\Notifications\Notification;
use App\Entity\Search;
use App\Form\ContactType;
use App\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\HandleRequest;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\BijouxRepository;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @Route("/", name="accueil")
     */
    public function index(Request $request, PaginatorInterface $paginator):Response
    {
      $search=new Search();
      $form=$this->createForm(SearchType::class,$search);
      $form->handleRequest($request);

      $bijoux=$paginator->paginate($this->getDoctrine()->getRepository(Bijoux::class)->findAll(),
    $request->query->getInt('page',1),10);
      
        return $this->render('home/index.html.twig' ,[
          'bijoux' => $bijoux ,
          'form'=>$form->createView()]);
    }

    /**
     * @Route("/liste", name="liste")
     */
    public function liste(Request $request, PaginatorInterface $paginator):Response
    {
      $search=new Search();
      $form=$this->createForm(SearchType::class,$search);
      $form->handleRequest($request);

      $bijoux=$paginator->paginate($this->getDoctrine()->getRepository(Bijoux::class)->findAll(),
    $request->query->getInt('page',1),10);
      
        return $this->render('home/liste.html.twig' ,[
          'bijoux' => $bijoux ,
          'form'=>$form->createView()]);
    }
     /**
      * @Route("/collier/{id}", name="collier")
      */
     public function collier(Bijoux $bijoux, $id)
     {
      $bijou =$this->getDoctrine()->getRepository(Bijoux::class)->find($id);
         return $this->render('home/colliers.html.twig',
       ['bijoux'=>$bijou ]
       );
     }
      /**
      * @Route("/contact", name="contact")
      */
      public function contact(Notification $notification,Request $request){
        $contact=new Contact();
        
        $form=$this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
          $notification->notify($contact);
         $this->addFlash('success','votre email a bien été envoyé');
         $this->redirectToRoute('home');
        }
        return $this->render('home/contact.html.twig',
       [ 'form'=>$form->createView() ]);
      }



}
