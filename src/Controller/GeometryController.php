<?php

namespace App\Controller;

use App\Service\GeometryCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GeometryController extends AbstractController
{
    public function __construct(
        private GeometryCalculator $calculator
    ) {}

    #[Route('/triangle/{base}/{height}/{side}', methods: ['GET'])]
    public function triangle(float $base, float $height, float $side): JsonResponse
    {
        $area = $this->calculator->calculateTriangleArea($base, $height);
        
        return $this->json([
            'base' => $base,
            'height' => $height,
            'side' => $side,
            'area' => $area
        ]);
    }

    #[Route('/circle/{radius}', methods: ['GET'])]
    public function circle(float $radius): JsonResponse
    {
        $area = $this->calculator->calculateCircleArea($radius);
        
        return $this->json([
            'radius' => $radius,
            'area' => $area
        ]);
    }
}
