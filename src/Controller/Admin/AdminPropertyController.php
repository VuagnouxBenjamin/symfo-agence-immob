<?php

namespace App\Controller\Admin;

use App\Entity\Properties;
use App\Form\PropertyType;
use App\Repository\PropertiesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController {

    /**
     * @var PropertiesRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;


    public function __construct(PropertiesRepository $repository, EntityManagerInterface $em) {
        $this->repository = $repository;
        $this->em = $em;
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
     * @Route("/admin/property/create", name="admin.property.new")
     */
    public function new(Request $request): Response
    {
        $property = new Properties();
        $form = $this->createForm(PropertyType::class, $property );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($property);
            $this->em->flush();
            $this->addFlash('success', 'Propriété ajoutée avec succès.' );

            return $this->redirectToRoute('admin.property.index');
        }

        // View rendering
        return $this->render('admin/property/new.html.twig', [
            'property' => $property,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/admin/property/edit/{id}", name="admin.property.edit", methods="GET|POST")
     */
    public function edit(Properties $property, Request $request): Response
    {
        // Form management (creation, request, validation, flush)
        $form = $this->createForm(PropertyType::class, $property );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            $this->addFlash('success', 'Propriété modifiée avec succès.' );
            return $this->redirectToRoute('admin.property.index');
        }

        // View rendering
        return $this->render('admin/property/edit.html.twig', [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/delete/{id}", name="admin.property.delete")
     */
    public function delete(Properties $property, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete' . $property->getId(), $request->get('_token') )) {
            $this->em->remove($property);
            $this->em->flush();
            $this->addFlash('success', 'Propriété supprimée avec succès.' );

        }
        return $this->redirectToRoute('admin.property.index');
    }
}