<?php
namespace App\Entity;

class Triangle
{
    private float $a;
    private float $b;
    private float $c;

    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function calculateSurface(): float
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    public function calculateDiameter(): float
    {
        return $this->a + $this->b + $this->c;
    }

    public function getSides(): array
    {
        return [$this->a, $this->b, $this->c];
    }
}
