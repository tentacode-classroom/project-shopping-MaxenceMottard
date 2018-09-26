<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\BuildingRepository;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index()
    {
        $json = file_get_contents( __DIR__ . '/../../public/data.json' );
        $products = json_decode( $json );

        $buildings = new BuildingRepository( $products );
        dump($buildings);

        return $this->render('home_page.html.twig', [
            'products'  =>  $buildings->findAll()
        ]);
    }
}
