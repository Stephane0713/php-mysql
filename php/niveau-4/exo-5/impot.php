<?php

class Impot
{
    private $name;
    private $income;
    private const LOWTAX = 0.15;
    private const HIGHTAX = 0.2;

    public function __construct($name, $income)
    {
        $this->name = $name;
        $this->income = $income;
    }

    public function calculateTax()
    {
        return $this->income * ($this->income < 15000 ? Impot::LOWTAX : Impot::HIGHTAX);
    }

    public function showTax()
    {
        return "Monsieur $this->name vôtre impot est de " . $this->calculateTax();
    }
}
