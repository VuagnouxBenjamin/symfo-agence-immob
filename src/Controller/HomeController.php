<?php


namespace App\Controller;

use App\Repository\PropertiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(PropertiesRepository $repository) :Response
    {
        $properties = $repository->findLatest();
        return $this->render('home/home.index.html.twig',[
            'properties' => $properties,
        ]);
    }
}