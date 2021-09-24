<?php
declare(strict_types=1);
namespace App\Controller;

use App\Entity\Doctor;
use App\Entity\Visit;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @Route("/doctor/{id}/visit")
     */
    public function getDoctors(int $id): JsonResponse
    {
        $doctorRepository = $this->getDoctrine()->getRepository(Doctor::class);
        $visitRepository = $this->getDoctrine()->getRepository(Visit::class);

        $doctor = $doctorRepository->find($id);
        $visits = $visitRepository->findBy(['doctor' => $doctor]);
        $data = $this->serializer->serialize($visits, 'json');

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }
}
