<?php

namespace App\Service;

use App\Entity\Triangle;

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
} 