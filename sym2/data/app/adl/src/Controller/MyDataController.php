<?php


namespace App\Controller;


use App\Entity\Business;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MyDataController extends AbstractController
{
    /**
     * @Route("/home/mydata", name="app_data")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Business::class);
        $business =  $repo->findOneBy(['username' => 'toto']);
        return $this->render('app/data.html.twig', ['business' => $business ]);
    }
}