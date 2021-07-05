<?php

namespace App\Controller\Admin;

use App\Repository\PropertiesRepository;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController {

    /**
     * @var PropertiesRepository
     */
    private $repository;

    public function __construct(PropertiesRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin.property.index")
     */
    public function index(): Response
    {
        $properties = $this->repository->findAll();

        return $this->render('admin/property/index.html.twig', [
            'properties' => $properties
        ]);
    }

    /**
     * @Route("/admin/{id}/edit", name="admin.property.edit")
     */
    public function edit($id): Response
    {
        $property = $this->repository->find($id);

        return $this->render('admin/property/edit.html.twig', [
            'property' => $property
        ]);
    }
}