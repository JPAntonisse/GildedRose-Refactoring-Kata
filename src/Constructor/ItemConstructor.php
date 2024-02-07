<?php

namespace GildedRose\Constructor;

use GildedRose\Item;
use GildedRose\Items\AgedBrie;
use GildedRose\Items\BackstagePass;
use GildedRose\Items\DefaultItem;
use GildedRose\Items\Sulfuras;

/**
 *
 */
final class ItemConstructor
{
    /**
     * @param Item $item
     * @return AgedBrie
     */
    public static function construct(Item $item)
    {
        // Check if conjured, and remove from Class Matching
        $isConjured = (str_starts_with($item->name, "Conjured "));
        $name = str_replace("Conjured ", '', $item->name);

        return match ($name) {
            'Aged Brie' => new AgedBrie($item, $isConjured),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePass($item, $isConjured),
            'Sulfuras, Hand of Ragnaros' => new Sulfuras($item, $isConjured),
            default => new DefaultItem($item, $isConjured)
        };
    }
}
