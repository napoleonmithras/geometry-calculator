<?php

namespace App\Service;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Entity\ShapeInterface;

class GeometryCalculator
{
    /**
     * Calculates the area of a triangle using Heron's formula.
     * 
     * @param Triangle $triangle The triangle to calculate the area for.
     * @return float The area of the triangle.
     */
    public function calculateTriangleArea(Triangle $triangle): float
    {
        $a = $triangle->getSideA();
        $b = $triangle->getSideB();
        $c = $triangle->getSideC();
        
        // Calculate the semi-perimeter of the triangle
        $s = ($a + $b + $c) / 2;
        // Apply Heron's formula to calculate the area
        return sqrt($s * ($s - $a) * ($s - $b) * ($s - $c));
    }

    /**
     * Calculates the area of a circle.
     * 
     * @param Circle $circle The circle to calculate the area for.
     * @return float The area of the circle.
     */
    public function calculateCircleArea(Circle $circle): float
    {
        // Formula for the area of a circle: πr^2
        return pi() * pow($circle->getRadius(), 2);
    }

    /**
     * Calculates the perimeter of a triangle.
     * 
     * @param Triangle $triangle The triangle to calculate the perimeter for.
     * @return float The perimeter of the triangle.
     */
    public function calculateTrianglePerimeter(Triangle $triangle): float
    {
        // Sum of all sides of the triangle
        return $triangle->getSideA() + $triangle->getSideB() + $triangle->getSideC();
    }

    /**
     * Calculates the perimeter of a circle (circumference).
     * 
     * @param Circle $circle The circle to calculate the perimeter for.
     * @return float The perimeter of the circle.
     */
    public function calculateCirclePerimeter(Circle $circle): float
    {
        // Formula for the circumference of a circle: 2πr
        return 2 * pi() * $circle->getRadius();
    }

    /**
     * Calculates the sum of the areas of two shapes.
     * 
     * @param ShapeInterface $shape1 The first shape.
     * @param ShapeInterface $shape2 The second shape.
     * @return float The sum of the areas of the two shapes.
     */
    public function sumAreas(ShapeInterface $shape1, ShapeInterface $shape2): float 
    {
        return $shape1->getArea() + $shape2->getArea();
    }

    /**
     * Calculates the sum of the diameters of two shapes.
     * 
     * @param ShapeInterface $shape1 The first shape.
     * @param ShapeInterface $shape2 The second shape.
     * @return float The sum of the diameters of the two shapes.
     */
    public function sumDiameters(ShapeInterface $shape1, ShapeInterface $shape2): float
    {
        return $shape1->getDiameter() + $shape2->getDiameter();
    }
} 