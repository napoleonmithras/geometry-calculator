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
        try {
            if ($radius <= 0) {
                throw new \InvalidArgumentException('Radius must be positive');
            }

            $circle = new Circle($radius);
            
            // Quick sanity check before returning results
            $surface = $circle->getSurface();
            $circumference = $circle->getCircumference();
            
            if (!is_finite($surface) || !is_finite($circumference)) {
                throw new \RuntimeException('Got some wonky values from the calculation');
            }
            
            return new JsonResponse([
                'surface' => round($surface, 2),
                'circumference' => round($circumference, 2),
                'radius' => round($radius, 2)
            ]);
            
        } catch (\Throwable $e) {
            return new JsonResponse([
                'error' => 'Oops! ' . $e->getMessage()
            ], 400);
        }
    }

    #[Route('/triangle/{a}/{b}/{c}', name: 'calculate_triangle', methods: ['GET'])]
    public function calculateTriangle(float $a, float $b, float $c): JsonResponse
    {
        try {
            $triangle = new Triangle($a, $b, $c);
            
            // Let the calculator do its thing
            $surface = $this->calculator->calculateTriangleArea($triangle);
            $circumference = $this->calculator->calculateTrianglePerimeter($triangle);
            
            if (!is_finite($surface) || !is_finite($circumference)) {
                throw new \RuntimeException('Math went wrong somewhere');
            }
            
            return new JsonResponse([
                'type' => 'triangle',
                'a' => round($a, 2),
                'b' => round($b, 2),
                'c' => round($c, 2),
                'surface' => round($surface, 2),
                'circumference' => round($circumference, 2),
            ]);
            
        } catch (\Throwable $e) {
            return new JsonResponse([
                'error' => 'Something went wrong: ' . $e->getMessage()
            ], 400);
        }
    }
}
