<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Doctor;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DoctorController extends AbstractController
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route("/doctor", methods={"GET"})
     */
    public function getDoctors(): JsonResponse
    {
        $repository = $this->getDoctrine()->getRepository(Doctor::class);
        $doctors = $repository->findAll();
        $data = $this->serializer->serialize($doctors, 'json');

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/doctor", methods={"POST"})
     */
    public function addDoctor(Request $request): JsonResponse
    {
        $manager = $this->getDoctrine()->getManager();

        $doctor = new Doctor(
            (string) $request->request->get('name'),
        );

        $manager->persist($doctor);
        $manager->flush();

        return new JsonResponse([], Response::HTTP_ACCEPTED);
    }
}
