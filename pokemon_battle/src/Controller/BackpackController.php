<?php

namespace App\Controller;

use App\Entity\Objects;
use App\Repository\ObjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backpack")
 */
class BackpackController extends AbstractController
{
    /**
     * @Route("/", name="backpack_index", methods={"GET"})
     */
    public function index(ObjectsRepository $ObjectsRepository): Response
    {
        return $this->render('backpack/index.html.twig', [
            'backpack' => $ObjectsRepository->findAll(),
        ]);
    }
    /**
     * @Route("/id/{id}", name="backpack_show", methods={"GET"})
     */
    public function show(Objects $objects): Response
    {
        return $this->render('backpack/show.html.twig', [
            'objects' => $objects,
        ]);
    }
}