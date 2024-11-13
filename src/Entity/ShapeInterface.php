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
    public function getSurface(): float;

    /**
     * Method to get the circumference of the shape.
     * 
     * @return float The circumference of the shape.
     */
    public function getCircumference(): float;
}