<?php

namespace App\Odds;

class LineConverter
{
    protected PairaLynes $lynes;
    protected int $fLine;
    protected int $dLine;

    protected float $fImpProb;
    protected float $dImpProb;

    protected float $fOdds;
    protected float $dOdds;

    //maybe a PairA here
    public function __construct(PairaLynes $lynes)
    {
        $this->lynes = $lynes;
        $this->fLine = $lynes->getFavorite();
        $this->dLine = $lynes->getDog();
        
        $this->setLines($this->lynes);

        $this->fLine = $this->lynes->getFavorite();
        $this->dLine = $this->lynes->getDog();

        $this->setImpProb();
        $this->setOdds();
    }

    public function setLines()
    {
        //$this->fLine = abs($fLine);
        //$this->dLine = $dLine;

        $this->setImpProb();
        $this->setOdds();
    }

    /*
    public function setLines(PairaLynes $myLynes)
    {

    }
    */

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

    public function getfImpProb(): float
    {
        return $this->fImpProb;
    }

    public function getdImpProb(): float
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
}