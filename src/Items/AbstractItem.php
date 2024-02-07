<?php

namespace GildedRose\Items;

use GildedRose\Counters\Quality;
use GildedRose\Counters\SellIn;
use GildedRose\Item;

/**
 *
 */
abstract class AbstractItem
{
    /**
     * @var Item
     */
    private Item $item;

    /**
     * @var bool
     */
    protected bool $isConjured;

    /**
     * @var Quality
     */
    protected Quality $quality;
    /**
     * @var SellIn
     */
    protected SellIn $sellIn;

    /**
     * @param Item $item
     * @param bool $isConjured
     */
    public function __construct(Item $item, bool $isConjured)
    {
        $this->item = $item;
        $this->isConjured = $isConjured;
        $this->quality = new Quality($item->quality);
        $this->sellIn = new SellIn($item->sellIn);
    }

    /**
     * @return int
     */
    public function change(): int
    {
        $change = 1;

        if ($this->isConjured) {
            $change *= 2;
        }

        if ($this->sellIn->passed()) {
            $change *= 2;
        }

        return $change;
    }

    /**
     * @return void
     */
    public function store(): void
    {
        $this->item->quality = $this->quality->amount();
        $this->item->sellIn = $this->sellIn->amount();
    }

    /**
     * @return void
     */
    public function update()
    {
        $this->quality->decrease($this->change());
        $this->sellIn->decrease();
        $this->store();
    }
}