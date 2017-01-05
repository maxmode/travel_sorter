<?php
namespace Maxmode\TravelSorter\Model;
use Maxmode\TravelSorter\Model\Journey\Item;

/**
 * Journey model
 */
class Journey
{
    /**
     * @var Item[]
     */
    protected $_items;

    /**
     * @param Item $item
     */
    public function addItem(Item $item)
    {
        $this->_items[] = $item;
    }

    /**
     * @return Journey\Item[]
     */
    public function getItems()
    {
        return $this->_items;
    }

    /**
     * @param Journey\Item[] $items
     */
    public function setItems($items)
    {
        $this->_items = $items;
    }
}
