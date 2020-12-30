<?php

namespace App\Controller;

use App\Form\BijouxType;
use App\Entity\Bijoux;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\HandleRequest;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * @Route("/liste2", name="liste2")
     */
    public function liste():Response

    {
        
    	$bijoux=$this->getDoctrine()->getRepository(Bijoux::class)->findAll();
        return $this->render('admin/liste.html.twig',['bijoux'=>$bijoux]);
    }
     /**
     * @Route("/ajout", name="ajouter")
     */
    public function ajouter(Request $request):Response
    {
    	$bijou=new Bijoux();
    	$bijoux=$this->createForm(BijouxType::class , $bijou);
    	$bijoux->handleRequest($request);

    	if ($bijoux->isSubmitted() && $bijoux->isValid()) {
        $file=$bijou->getImage();
        $fileName=md5(uniqid()).'.'.$file->guessExtension();
        $file->move($this->getParameter('images_directory'),$fileName);
        $bijou->setImage($fileName);
        $manager=$this->getDoctrine()->getManager();

    		$manager->persist($bijou);
            $manager->flush();
            $this->addFlash('success','bien ajouté');
    		 return $this->redirectToRoute('home');
    	}
        return $this->render('admin/ajout.html.twig',['bijoux'=>$bijoux->createView()]);
    }
    /**
     * @Route("/edit/{id}", name="editer")
     */
    public function editer(Bijoux $bijou,Request $request):Response
    {
    	
    	$bijoux=$this->createForm(BijouxType::class , $bijou);
    	$bijoux->handleRequest($request);

    	if ($bijoux->isSubmitted() && $bijoux->isValid()) {
            $file=$bijou->getImage();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('images_directory'),$fileName);
            $bijou->setImage($fileName);
        $manager=$this->getDoctrine()->getManager();
            $manager->flush();
            $this->addFlash('success','bien modifié');
    		 return $this->redirectToRoute('home');
    	}
        return $this->render('admin/editer.html.twig',['bijoux'=>$bijoux->createView()]);
    }
     /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Request $request, Bijoux $bijoux){
        if ($this->isCsrfTokenValid('delete'.$bijoux->getId(),$request->get('token'))) {
            $em=$this->getDoctrine()->getManager();
            $em->remove($bijoux);
            $em->flush();
        }
        
        return $this->redirectToRoute('home');
      }

}
