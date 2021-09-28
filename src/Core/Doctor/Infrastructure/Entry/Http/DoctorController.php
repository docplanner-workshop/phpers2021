<?php

declare(strict_types=1);

namespace App\Core\Doctor\Infrastructure\Entry\Http;

use App\Core\Doctor\Application\AddDoctor\AddDoctorInput;
use App\Core\Doctor\Application\AddDoctor\AddDoctorService;
use App\Core\Doctor\Application\GetDoctors\GetDoctorsService;
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
    public function getDoctors(GetDoctorsService $service): JsonResponse
    {
        $data = $this->serializer->serialize($service(), 'json');

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/doctor", methods={"POST"})
     */
    public function addDoctor(Request $request, AddDoctorService $addDoctorService): JsonResponse
    {
        $input = new AddDoctorInput(
            (string) $request->request->get('name')
        );
        $addDoctorService($input);

        return new JsonResponse([], Response::HTTP_ACCEPTED);
    }
}
