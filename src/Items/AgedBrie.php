<?php

namespace GildedRose\Items;

use GildedRose\Item;

/**
 *
 */
class AgedBrie extends AbstractItem
{
    /**
     * @return void
     */
    public function update(): void
    {
        $change = $this->change();

        $this->quality->increase($change);
        $this->store();
    }

}