<?php

namespace GildedRose\Counters;

/**
 *
 */
class Quality
{
    /**
     * @var int
     */
    private int $quality;

    /**
     * @param int $quality
     */
    public function __construct(int $quality)
    {
        $this->quality = $quality;
    }

    /**
     * @param int $amount
     * @return void
     */
    public function increase(int $amount = 1): void
    {
        $this->quality += $amount;

        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }

    /**
     * @param int $amount
     * @return void
     */
    public function decrease(int $amount = 1): void
    {
        $this->quality -= $amount;

        if ($this->quality < 0) {
            $this->quality = 0;
        }
    }

    /**
     * @param int $quality
     * @return void
     */
    public function set(int $quality): void
    {
        $this->quality = $quality;

        if ($quality < 0) {
            $this->quality = 0;
        }
    }

    /**
     * @return int
     */
    public function amount(): int
    {
        return $this->quality;
    }


}