<?php

namespace App\Controller\Rest;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ArticleController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }
    /**
     * Creates an Article resource
     * @Rest\Post("/article")
     * @param Request $request
     * @return Response
     */

    public function postAction(
        Request $request
    ) {
        $form = $this->createForm(ArticleType::class);

        $form->submit($request->request->all());

        $this->entityManager->persist($form->getData());
        $this->entityManager->flush();

        $response = new Response();
        $response->setContent(json_encode([
            'data' => "True"
        ]));

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}