<?php

namespace App\Service;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Entity\ShapeInterface;

class GeometryCalculator
{
    public function calculateTriangleArea(Triangle $triangle): float
    {
        return $triangle->getSurface();
    }

    public function calculateTrianglePerimeter(Triangle $triangle): float
    {
        return $triangle->getCircumference();
    }

    public function sumAreas(ShapeInterface $shape1, ShapeInterface $shape2): float
    {
        return $shape1->getSurface() + $shape2->getSurface();
    }

    public function sumDiameters(Triangle|Circle $shape1, Triangle|Circle $shape2): float
    {
        $diameter1 = $shape1 instanceof Circle ? ($shape1->getRadius() * 2) : $shape1->getDiameter();
        $diameter2 = $shape2 instanceof Circle ? ($shape2->getRadius() * 2) : $shape2->getDiameter();
        return $diameter1 + $diameter2;
    }
} 