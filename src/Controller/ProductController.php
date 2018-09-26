<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\BuildingRepository;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{productId}", name="product")
     */
    public function index( $productId = null )
    {
        $json = file_get_contents( __DIR__ . '/../../public/data.json' );
        $productArray = json_decode( $json );
        $buildings = new BuildingRepository( $productArray );

        return $this->render('product.html.twig', [
            'product' => $buildings->findOneById( (int) $productId ),
        ]);
    }
}
