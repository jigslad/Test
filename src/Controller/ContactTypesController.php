<?php

namespace App\Controller;

use App\Entity\ContactTypes;
use App\Form\ContactTypesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contacttypes")
 */
class ContactTypesController extends AbstractController
{
    /**
     * @Route("/", name="contacttypes_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tblcontacttypes = $this->getDoctrine()
            ->getRepository(ContactTypes::class)
            ->findAll();

        return $this->render('ContactTypes/index.html.twig', [
            'tblcontacttypes' => $tblcontacttypes,
        ]);
    }

    /**
     * @Route("/new", name="contacttypes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblcontacttype = new ContactTypes();
        $form = $this->createForm(ContactTypesType::class, $tblcontacttype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblcontacttype);
            $entityManager->flush();

            return $this->redirectToRoute('contacttypes_index');
        }

        return $this->render('ContactTypes/new.html.twig', [
            'tblcontacttype' => $tblcontacttype,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contacttypes_show", methods={"GET"})
     */
    public function show(ContactTypes $tblcontacttype): Response
    {
        return $this->render('ContactTypes/show.html.twig', [
            'tblcontacttype' => $tblcontacttype,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contacttypes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ContactTypes $tblcontacttype): Response
    {
        $form = $this->createForm(ContactTypesType::class, $tblcontacttype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contacttypes_index');
        }

        return $this->render('ContactTypes/edit.html.twig', [
            'tblcontacttype' => $tblcontacttype,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contacttypes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ContactTypes $tblcontacttype): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblcontacttype->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblcontacttype);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contacttypes_index');
    }
}
