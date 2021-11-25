<?php

namespace App\Odds;

class PairA
{
    private $a;
    private $b;

    public function __construct(int $a, int $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function setA($num)
    {
        $this->a = $num;
    }

    public function getA()
    {
        return $this->a;
    }

    public function setB($num)
    {
        $this->b = $num;
    }

    public function getB()
    {
        return $this->b;
    }
}