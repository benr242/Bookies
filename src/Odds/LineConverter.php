<?php

namespace App\Odds;

class LineConverter
{
    protected int $fLine;
    protected int $dLine;

    protected float $fImpProb;
    protected float $dImpProb;

    protected float $fOdds;
    protected float $dOdds;

    public function __construct(int $fLine, int $dLine)
    {
        $this->fLine = abs($fLine);
        $this->dLine = $dLine;

        $this->setImpProb();
        $this->setOdds();
    }

    public function setLines(int $fLine, int $dLine)
    {
        $this->fLine = abs($fLine);
        $this->dLine = $dLine;

        $this->setImpProb();
        $this->setOdds();
    }

    public function setImpProb()
    {
        $this->fImpProb = $this->fLine/($this->fLine + 100) * 100;
        $this->dImpProb = 100/($this->dLine + 100) * 100;
    }

    public function setOdds()
    {
        $this->fOdds = $this->fImpProb / ($this->fImpProb + $this->dImpProb) * 100;
        $this->dOdds = $this->dImpProb / ($this->dImpProb + $this->fImpProb) * 100;
    }

    public static function getFpercent($a, $b): int
    {
        return self::getFodds();
        return 100;
    }

    public static function getDpercent($a, $b): int
    {
        return self::getDodds();
        return 100;
    }

    public function getfImpProb()
    {
        return $this->fImpProb;
    }

    public function getdImpProb()
    {
        return $this->dImpProb;
    }

    public function getFodds(): float
    {
        return $this->fOdds;
    }

    public function getDodds(): float
    {
        return $this->dOdds;
    }

    public static function hello($str)
    {
        $msq = $str;
        return $msq;
    }

    public static function getAPer($a, $b)
    {
        return $a;
    }
}