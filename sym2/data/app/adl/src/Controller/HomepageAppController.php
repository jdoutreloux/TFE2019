<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageAppController extends AbstractController
{
    public function index()
    {

        return $this->render('app/homepage.html.twig');
    }
}