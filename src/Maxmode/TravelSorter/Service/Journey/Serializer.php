<?php

namespace Maxmode\TravelSorter\Service\Journey;
use Maxmode\TravelSorter\Model\Journey;

/**
 * Serializer is used to convert input array into object and backwards
 */
class Serializer
{
    /**
     * @param array $inpitList List of journey items. Each item is an array
     *                         and should contain string values in keys:
     *                         source, destination, means, seat
     *
     * @return Journey
     */
    public function fromArrayToJourney($inpitList)
    {
        $journey = new Journey;
        foreach ($inpitList as $itemData) {
            $item = new Journey\Item();
            $item->setSource($itemData['source']);
            $item->setDestination($itemData['destination']);
            $item->setMeans($itemData['means']);
            $item->setSeat($itemData['seat']);
            $journey->addItem($item);
        }

        return $journey;
    }

    /**
     * @param Journey $journey
     *
     * @return array
     */
    public function fromJourneyToArray(Journey $journey)
    {
        $result = [];
        foreach ($journey->getItems() as $item) {
            $result[] = [
                'source' => $item->getSource(),
                'destination' => $item->getDestination(),
                'means' => $item->getMeans(),
                'seat' => $item->getSeat(),
            ];
        }

        return $result;
    }
}
