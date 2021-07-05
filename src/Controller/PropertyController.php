<?php


namespace App\Controller;

use App\Repository\PropertiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PropertyController
 * @package App\Controller
 */
class PropertyController extends AbstractController
{
    /**
     * @var PropertiesRepository
     */
    private $repository;

    public function __construct(PropertiesRepository $repository )
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/biens", name="property.index")
     */
    public function index(): Response
    {
        $property = $this->repository->findALlVisible();

        return $this->render('properties/property.index.html.twig', [
            'current_menu' => 'properties',
            'properties' => $property
        ]);
    }

    /**
     * @Route("/biens/{id}-{slug}", name="property.show")
     */
    public function show($slug, $id): Response
    {
        $property = $this->repository->find($id);

        if ($property->getSlug() !== $slug)
        {
            return $this->redirectToRoute('property.show', [
                'id' => $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }

        return $this->render('properties/property.show.html.twig', [
            'current_menu' => 'properties',
            'property' => $property
        ]);
    }
}