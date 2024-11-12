<?php

namespace App\Service;

class GeometryCalculator
{
    public function calculateTriangleArea(float $base, float $height): float 
    {
        return ($base * $height) / 2;
    }

    public function calculateCircleArea(float $radius): float
    {
        return pi() * $radius * $radius;
    }
} 