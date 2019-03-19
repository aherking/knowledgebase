<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class TestController extends AbstractController
{
    /**
     * @Route("/test")
     */
    public function index()
    {

        return $this->render('/test.html.twig', [
   
        ]);
    }
}