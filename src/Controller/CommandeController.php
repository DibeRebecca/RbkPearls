<?php

namespace App\Controller;
use App\Form\CommandeType;
use App\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\HandleRequest;
use Symfony\Component\HttpFoundation\Request;


class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     */
     public function index(Request $request):Response
   {
     $command= new Commande();

     $commande=$this->createForm(CommandeType::class, $command);
     $commande->handleRequest($request);
     $manager=$this->getDoctrine()->getManager();

     if ($commande->isSubmitted()&& $commande->isValid()) {
       $manager->persist($command);
       $manager->flush();
       return $this->redirectToRoute('home');
     }
       return $this->render('home/commande.html.twig',[
         'commande'=>$commande->createView(),
       ]);
   }
}
