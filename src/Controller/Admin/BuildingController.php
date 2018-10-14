<?php

namespace App\Controller\Admin;

use App\Entity\Building;
use App\Form\BuildingType;
use App\Repository\BuildingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/building")
 */
class BuildingController extends AbstractController
{
    /**
     * @Route("/", name="building_index", methods="GET")
     */
    public function index(BuildingRepository $buildingRepository): Response
    {
        return $this->render('building/index.html.twig', ['buildings' => $buildingRepository->findAll()]);
    }

    /**
     * @Route("/new", name="building_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $building = new Building();
        $form = $this->createForm(BuildingType::class, $building);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($building);
            $em->flush();

            return $this->redirectToRoute('building_index');
        }

        return $this->render('building/new.html.twig', [
            'building' => $building,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="building_show", methods="GET")
     */
    public function show(Building $building): Response
    {
        return $this->render('building/show.html.twig', ['building' => $building]);
    }

    /**
     * @Route("/{id}/edit", name="building_edit", methods="GET|POST")
     */
    public function edit(Request $request, Building $building): Response
    {
        $form = $this->createForm(BuildingType::class, $building);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('building_edit', ['id' => $building->getId()]);
        }

        return $this->render('building/edit.html.twig', [
            'building' => $building,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="building_delete", methods="DELETE")
     */
    public function delete(Request $request, Building $building): Response
    {
        if ($this->isCsrfTokenValid('delete'.$building->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($building);
            $em->flush();
        }

        return $this->redirectToRoute('building_index');
    }
}
