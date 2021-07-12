<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Operation;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/operations", name="api_get_operations", methods={"GET"})
     */
    public function getOperations(): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $operations = $em->getRepository(Operation::class)->findAll();
        
        if (!$operations) {
            throw new HttpException(200, "No operation found");   
        }

        foreach ($operations as $key => $operation) {
            $data[] = [
                'id' => $operation->getId(),
                'name' => $operation->getName(),
                'img' => $operation->getImg(),
                'price' => $operation->getPrice(),
                'type' => $operation->getTypeofOperation()->getName(),
            ];
        }

        return new JsonResponse([
            'status_code' => 200,
            'data' => $data
        ]);
    }

    public function getContactInfo(): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        
    }
}
