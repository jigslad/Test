<?php

namespace App\Controller;

use App\Entity\Persons;
use App\Form\PersonsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class PersonsController extends AbstractController
{
    /**
     * @Route("/", name="tblpersons_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tblpersons = $this->getDoctrine()
            ->getRepository(Persons::class)
            ->findAll();

        return $this->render('Persons/index.html.twig', [
            'tblpersons' => $tblpersons,
        ]);
    }

    /**
     * @Route("/new", name="tblpersons_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblperson = new Persons();
        $form = $this->createForm(PersonsType::class, $tblperson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblperson);
            $entityManager->flush();

            return $this->redirectToRoute('tblpersons_index');
        }

        return $this->render('Persons/new.html.twig', [
            'tblperson' => $tblperson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tblpersons_show", methods={"GET"})
     */
    public function show(Persons $tblperson): Response
    {
        return $this->render('Persons/show.html.twig', [
            'tblperson' => $tblperson,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tblpersons_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Persons $tblperson): Response
    {
        $form = $this->createForm(PersonsType::class, $tblperson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tblpersons_index');
        }

        return $this->render('Persons/edit.html.twig', [
            'tblperson' => $tblperson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tblpersons_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Persons $tblperson): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblperson->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblperson);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tblpersons_index');
    }
}