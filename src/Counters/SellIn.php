<?php

namespace GildedRose\Counters;


/**
 *
 */
class SellIn
{
    /**
     * @var int
     */
    private int $sellIn;

    /**
     * @param int $sellIn
     */
    public function __construct(int $sellIn)
    {
        $this->sellIn = $sellIn;
    }

    /**
     * @param int $amount
     * @return void
     */
    public function increase(int $amount = 1): void
    {
        $this->sellIn += $amount;

        if ($this->sellIn > 50) {
            $this->sellIn = 50;
        }
    }

    /**
     * @param int $amount
     * @return void
     */
    public function decrease(int $amount = 1): void
    {
        $this->sellIn -= $amount;

        if ($this->sellIn < 0) {
            $this->sellIn = 0;
        }
    }

    /**
     * @param int $sellIn
     * @return void
     */
    public function set(int $sellIn): void
    {
        $this->sellIn = $sellIn;

        if ($sellIn < 0) {
            $this->sellIn = 0;
        }
    }

    /**
     * @return int
     */
    public function amount(): int
    {
        return $this->sellIn;
    }

    /**
     * @return bool
     */
    public function passed(): bool
    {
        return $this->sellIn === 0;
    }

}