<?php
namespace App\Entity;

class Circle implements ShapeInterface
{
    // Private property to hold the circle's radius
    private float $radius;

    // Constructor to initialize the circle with a given radius
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    // Method to calculate the surface area of the circle
    public function calculateSurface(): float
    {
        return pi() * pow($this->radius, 2);
    }

    // Method to calculate the diameter of the circle
    public function calculateDiameter(): float
    {
        return 2 * $this->radius;
    }

    // Method to calculate the circumference of the circle
    public function calculateCircumference(): float
    {
        return 2 * pi() * $this->radius;
    }

    // Getter method to retrieve the circle's radius
    public function getRadius(): float
    {
        return $this->radius;
    }

    public function getDiameter(): float
    {
        return $this->radius * 2;
    }

    public function getArea(): float
    {
        return $this->calculateSurface();
    }
}
