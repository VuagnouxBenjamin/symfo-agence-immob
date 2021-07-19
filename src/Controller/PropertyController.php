<?php


namespace App\Controller;

use App\Repository\PropertiesRepository;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
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
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $property = $this->repository->findALlVisible();

        $pagination = $paginator->paginate(
            $this->repository->findAllVisibleQuery(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6/*limit per page*/
        );

        return $this->render('properties/property.index.html.twig', [
            'current_menu' => 'properties',
            'properties' => $property,
            'pagination' => $pagination
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