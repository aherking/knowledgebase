<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class StartController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {

        return $this->render('/index/base.html.twig', [
   
        ]);
    }
}