<?php

namespace GildedRose\Items;

/**
 *
 */
class BackstagePass extends AbstractItem
{
    /**
     * @return void
     */
    public function update(): void
    {
        if ($this->sellIn->amount() === 0) {
            $this->quality->set(0);
        } elseif ($this->sellIn->amount() <= 5) {
            $this->quality->increase(3);
        }  elseif ($this->sellIn->amount() <= 10) {
            $this->quality->increase(2);
        } else {
            $this->quality->increase();
        }
        $this->sellIn->decrease();
        $this->store();
    }

}