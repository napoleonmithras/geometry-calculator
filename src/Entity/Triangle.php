<?php
namespace App\Entity;

/**
 * Represents a triangle with sides a, b, and c.
 */
class Triangle implements ShapeInterface
{
    private float $a; // Side a of the triangle
    private float $b; // Side b of the triangle
    private float $c; // Side c of the triangle

    /**
     * Constructor to initialize the triangle with given sides.
     * 
     * @param float $a The length of side a.
     * @param float $b The length of side b.
     * @param float $c The length of side c.
     */
    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    /**
     * Calculates the surface area of the triangle using Heron's formula.
     * 
     * @return float The surface area of the triangle.
     */
    public function calculateSurface(): float
    {
        $s = ($this->a + $this->b + $this->c) / 2; // Semi-perimeter of the triangle
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    /**
     * Calculates the circumference of the triangle.
     * 
     * @return float The circumference of the triangle.
     */
    public function calculateCircumference(): float
    {
        return $this->a + $this->b + $this->c; // Sum of all sides
    }

    /**
     * Returns the sides of the triangle.
     * 
     * @return array An array containing the lengths of sides a, b, and c.
     */
    public function getSides(): array
    {
        return [$this->a, $this->b, $this->c];
    }

    /**
     * Returns the area of the triangle.
     * 
     * @return float The area of the triangle.
     */
    public function getArea(): float
    {
        return $this->calculateSurface(); // Delegates to calculateSurface for area calculation
    }

    /**
     * Returns the diameter of the triangle (the longest side).
     * 
     * @return float The diameter of the triangle.
     */
    public function getDiameter(): float
    {
        return max($this->a, $this->b, $this->c); // Returns the longest side
    }

    public function getSideA(): float
    {
        return $this->a;
    }

    public function getSideB(): float
    {
        return $this->b;
    }

    public function getSideC(): float
    {
        return $this->c;
    }
}
