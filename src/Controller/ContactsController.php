<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contacts")
 */
class ContactsController extends AbstractController
{
    /**
     * @Route("/", name="tblcontacts_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tblcontacts = $this->getDoctrine()
            ->getRepository(Contacts::class)
            ->findAll();

        return $this->render('Contacts/index.html.twig', [
            'tblcontacts' => $tblcontacts,
        ]);
    }

    /**
     * @Route("/new", name="tblcontacts_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblcontact = new Contacts();
        $form = $this->createForm(ContactsType::class, $tblcontact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            dump($tblcontact);
            exit();
            $entityManager->persist($tblcontact);
            $entityManager->flush();

            return $this->redirectToRoute('tblcontacts_index');
        }

        return $this->render('Contacts/new.html.twig', [
            'tblcontact' => $tblcontact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{serialnumber}", name="tblcontacts_show", methods={"GET"})
     */
    public function show(Contacts $tblcontact): Response
    {
        return $this->render('Contacts/show.html.twig', [
            'tblcontact' => $tblcontact,
        ]);
    }

    /**
     * @Route("/{serialnumber}/edit", name="tblcontacts_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contacts $tblcontact): Response
    {
        $form = $this->createForm(ContactsType::class, $tblcontact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tblcontacts_index');
        }

        return $this->render('Contacts/edit.html.twig', [
            'tblcontact' => $tblcontact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{serialnumber}", name="tblcontacts_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contacts $tblcontact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblcontact->getSerialnumber(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblcontact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tblcontacts_index');
    }
}
