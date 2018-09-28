<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Building;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{productId}", name="product")
     */
    public function index( $productId = null )
    {
        $product = $this->getDoctrine()
            ->getRepository(Building::class)
            ->find( $productId );

        return $this->render('product.html.twig', [
            'product' => $product
        ]);
    }
}
