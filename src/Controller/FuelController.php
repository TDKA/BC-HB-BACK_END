<?php

namespace App\Controller;

use App\Repository\FuelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FuelController extends AbstractController
{
    /**
     * @Route("/api/fuel", name="fuel_type", methods={"GET"})
     */
    public function index(FuelRepository $repo): Response
    {
        $fuelType = $repo->findAll();
        return $this->json($fuelType, 200, [], ['groups' => ['fuel']]);
    }
}
