<?php

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Service\GeometryCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeometryController extends AbstractController
{
    private GeometryCalculator $calculator;

    public function __construct(GeometryCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    #[Route('/', name: 'app_geometry_welcome')]
    public function welcome(): Response
    {
        return $this->render('geometry/welcome.html.twig', [
            'title' => 'Geometry Calculator',
            'shapes' => [
                'Circle' => 'Calculate area, diameter, and circumference of circles',
                'Triangle' => 'Calculate area, diameter, and perimeter of triangles'
            ]
        ]);
    }

    #[Route('/circle/{radius}', name: 'calculate_circle', methods: ['GET'])]
    public function calculateCircle(float $radius): JsonResponse
    {
        $circle = new Circle($radius);
        
        return new JsonResponse([
            'type' => 'circle',
            'radius' => $radius,
            'surface' => round($this->calculator->calculateCircleArea($circle), 2),
            'circumference' => round($this->calculator->calculateCirclePerimeter($circle), 2),
        ]);
    }

    #[Route('/triangle/{a}/{b}/{c}', name: 'calculate_triangle', methods: ['GET'])]
    public function calculateTriangle(float $a, float $b, float $c): JsonResponse
    {
        $triangle = new Triangle($a, $b, $c);
        
        return new JsonResponse([
            'type' => 'triangle',
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'surface' => round($this->calculator->calculateTriangleArea($triangle), 2),
            'circumference' => round($this->calculator->calculateTrianglePerimeter($triangle), 2),
        ]);
    }
}
