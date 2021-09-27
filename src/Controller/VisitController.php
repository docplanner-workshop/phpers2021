<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Doctor;
use App\Entity\Visit;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class VisitController extends AbstractController
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route("/doctor/{id}/visit", methods={"GET"})
     */
    public function getDoctors(Doctor $doctor): JsonResponse
    {
        $visitRepository = $this->getDoctrine()->getRepository(Visit::class);

        $visits = $visitRepository->findBy(['doctor' => $doctor]);
        $data = $this->serializer->serialize($visits, 'json');

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/doctor/{id}/visit", methods={"POST"})
     */
    public function addVisit(Request $request, Doctor $doctor): JsonResponse
    {
        $manager = $this->getDoctrine()->getManager();
        $visit = new Visit(
            new \DateTimeImmutable($request->request->get('dateTime')),
            (int) $request->request->get('duration'),
            $doctor
        );

        $manager->persist($visit);
        $manager->flush();

        return new JsonResponse('', Response::HTTP_ACCEPTED, [], true);
    }
}
