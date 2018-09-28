<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class EvalController extends AbstractController
{
    /**
     * @Route("/eval", name="eval")
     */
    public function index(Request $request)
    {

        var_dump($request);

        return $this->render('eval/index.html.twig', [
            'controller_name' => 'EvalController',
        ]);
    }
}
