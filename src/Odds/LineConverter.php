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
        $this->fOdds = $this->fImpProb / ($this->fImpProb + $this->dImpProb);
        $this->dOdds = $this->dImpProb / ($this->dImpProb + $this->fImpProb);
    }

    public function getFodds(): float
    {
        return $this->fOdds;
    }

    public function getDodds(): float
    {
        return $this->dOdds;
    }
}