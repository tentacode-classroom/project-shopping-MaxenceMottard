<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Building;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index()
    {
        $buildings = $this->getDoctrine()
            ->getRepository(Building::class)
            ->findAll();

        return $this->render('home_page.html.twig', [
            'products'  =>  $buildings
        ]);
    }
}
