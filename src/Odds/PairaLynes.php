<?php

namespace App\Odds;

class PairaLynes
{
    private int $favorite;
    private int $dog;

    public function __construct(int $favorite, int $dog)
    {
        $this->favorite = $favorite;
        $this->dog = $dog;
    }

    public function setFavorite(int $favorite)
    {
        $this->favorite = $favorite;
    }

    public function getFavorite():int
    {
        return $this->favorite;
    }

    public function setDog(int $dog)
    {
        $this->dog = $dog;
    }

    public function getDog():int
    {
        return $this->dog;
    }
}