<?php

declare(strict_types=1);

namespace App\Legacy\Controller;

use App\Legacy\Service\AddVisit\AddVisitInput;
use App\Legacy\Service\AddVisit\AddVisitService;
use App\Legacy\Service\GetDoctorVisits\GetDoctorVisitsService;
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
    public function getDoctors(Request $request, GetDoctorVisitsService $service): JsonResponse
    {
        $data = $this->serializer->serialize($service($request->get('id')), 'json');

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/doctor/{id}/visit", methods={"POST"})
     */
    public function addVisit(Request $request, AddVisitService $service): JsonResponse
    {
        $input = new AddVisitInput(
            (string) $request->get('id'),
            new \DateTimeImmutable((string) $request->request->get('dateTime')),
            (int) $request->request->get('duration')
        );

        $service($input);

        return new JsonResponse('', Response::HTTP_ACCEPTED, [], true);
    }
}
