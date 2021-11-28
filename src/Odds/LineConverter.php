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

    public function __construct(PairaLynes $lynes)
    {
        //$this->lynes = $lynes;
        //$this->fLine = $lynes->getFavorite();
        //$this->dLine = $lynes->getDog();

        $this->setLines($lynes);

        //$this->fLine = $this->lynes->getFavorite();
        //$this->dLine = $this->lynes->getDog();

        //$this->setImpProb();
        //$this->setOdds();
    }

    public static function test(int $testInt):int
    {
        return $testInt * 2;
    }

    public function setLines(PairaLynes $lynes)
    {
        $this->lynes = $lynes;
        $this->fLine = $lynes->getFavorite();
        $this->dLine = $lynes->getDog();

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