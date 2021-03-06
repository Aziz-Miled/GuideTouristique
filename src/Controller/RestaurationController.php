<?php

namespace App\Controller;

use App\Entity\Restauration;
use App\Form\Restauration1Type;
use App\Form\RestaurationType;
use App\Repository\RestaurationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/restauration")
 */
class RestaurationController extends AbstractController
{
    /**
     * @Route("/", name="restauration_index", methods={"GET"})
     */
    public function index(RestaurationRepository $restaurationRepository): Response
    {
        return $this->render('restauration/index.html.twig', [
            'restaurations' => $restaurationRepository->findAll(),
        ]);
    }
    /**
     * @Route("/front", name="restauration_indexfront", methods={"GET"})
     */
    public function indexfront(RestaurationRepository $restaurationRepository): Response
    {
        return $this->render('restauration/frontafficherestauration.html.twig', [
            'restaurations' => $restaurationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="restauration_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $restauration = new Restauration();
        $form = $this->createForm(RestaurationType::class, $restauration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form['image']->getData();

            $file->move("images/", $file->getClientOriginalName());
            $restauration->setImage("images/".$file->getClientOriginalName());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($restauration);
            $entityManager->flush();

            return $this->redirectToRoute('restauration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('restauration/new.html.twig', [
            'restauration' => $restauration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="restauration_show", methods={"GET"})
     */
    public function show(Restauration $restauration): Response
    {
        return $this->render('restauration/show.html.twig', [
            'restauration' => $restauration,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="restauration_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Restauration $restauration): Response
    {
        $form = $this->createForm(RestaurationType::class, $restauration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('restauration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('restauration/edit.html.twig', [
            'restauration' => $restauration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="restauration_delete", methods={"POST"})
     */
    public function delete(Request $request, Restauration $restauration): Response
    {
        if ($this->isCsrfTokenValid('delete'.$restauration->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($restauration);
            $entityManager->flush();
        }

        return $this->redirectToRoute('restauration_index', [], Response::HTTP_SEE_OTHER);
    }
}
