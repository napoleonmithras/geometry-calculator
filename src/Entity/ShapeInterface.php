<?php
namespace App\Entity;

/**
 * Interface for geometric shapes.
 */
interface ShapeInterface
{
    /**
     * Method to get the area of the shape.
     * 
     * @return float The area of the shape.
     */
    public function getArea(): float;

    /**
     * Method to get the diameter of the shape.
     * 
     * @return float The diameter of the shape.
     */
    public function getDiameter(): float;
}