<?php

namespace App\Controller;

use App\Entity\TypeofOperation;
use App\Form\TypeofOperationType;
use App\Repository\TypeofOperationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typeof/operation")
 */
class TypeofOperationController extends AbstractController
{
    /**
     * @Route("/", name="typeof_operation_index", methods={"GET"})
     */
    public function index(TypeofOperationRepository $typeofOperationRepository): Response
    {
        return $this->render('typeof_operation/index.html.twig', [
            'typeof_operations' => $typeofOperationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typeof_operation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeofOperation = new TypeofOperation();
        $form = $this->createForm(TypeofOperationType::class, $typeofOperation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeofOperation);
            $entityManager->flush();

            return $this->redirectToRoute('typeof_operation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typeof_operation/new.html.twig', [
            'typeof_operation' => $typeofOperation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="typeof_operation_show", methods={"GET"})
     */
    public function show(TypeofOperation $typeofOperation): Response
    {
        return $this->render('typeof_operation/show.html.twig', [
            'typeof_operation' => $typeofOperation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="typeof_operation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeofOperation $typeofOperation): Response
    {
        $form = $this->createForm(TypeofOperationType::class, $typeofOperation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeof_operation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typeof_operation/edit.html.twig', [
            'typeof_operation' => $typeofOperation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="typeof_operation_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeofOperation $typeofOperation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeofOperation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeofOperation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typeof_operation_index', [], Response::HTTP_SEE_OTHER);
    }
}
