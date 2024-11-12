<?php
namespace App\Entity;

class Circle
{
    private float $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function calculateSurface(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function calculateDiameter(): float
    {
        return 2 * $this->radius;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }
}
