<?php

namespace App\Controller;

use App\Entity\Locations;
use App\Form\LocationsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/locations")
 */
class LocationsController extends AbstractController
{
    /**
     * @Route("/", name="tbllocations_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tbllocations = $this->getDoctrine()
            ->getRepository(Locations::class)
            ->findAll();

        return $this->render('Locations/index.html.twig', [
            'tbllocations' => $tbllocations,
        ]);
    }

    /**
     * @Route("/new", name="tbllocations_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tbllocation = new Locations();
        $form = $this->createForm(LocationsType::class, $tbllocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tbllocation);
            $entityManager->flush();

            return $this->redirectToRoute('tbllocations_index');
        }

        return $this->render('Locations/new.html.twig', [
            'tbllocation' => $tbllocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tbllocations_show", methods={"GET"})
     */
    public function show(Locations $tbllocation): Response
    {
        return $this->render('Locations/show.html.twig', [
            'tbllocation' => $tbllocation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tbllocations_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Locations $tbllocation): Response
    {
        $form = $this->createForm(LocationsType::class, $tbllocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbllocations_index');
        }

        return $this->render('Locations/edit.html.twig', [
            'tbllocation' => $tbllocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tbllocations_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Locations $tbllocation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tbllocation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tbllocation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbllocations_index');
    }
}
