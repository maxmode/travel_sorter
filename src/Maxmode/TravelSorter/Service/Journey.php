<?php
namespace Maxmode\TravelSorter\Service;

use \Maxmode\TravelSorter\Model\Journey as JourneyModel;

/**
 * Journey service
 */
class Journey
{
    /**
     * @param JourneyModel $journey
     *
     * @throws \Exception
     */
    public function sortJourney(JourneyModel $journey)
    {
        $items = $journey->getItems();
        /** @var JourneyModel\Item[] $sortedItems */
        $sortedItems = [];
        $sourceList = [];
        $destinationList = [];
        foreach ($items as $journeyItem) {
            $sourceList[] = $journeyItem->getSource();
            $destinationList[] = $journeyItem->getDestination();
            $sortedItems[$journeyItem->getSource()] = $journeyItem;
        }

        $journeyStartSource = null;
        foreach ($sourceList as $sourcePlace) {
            if (!in_array($sourcePlace, $destinationList)) {
                $journeyStartSource = $sourcePlace;
                break;
            }
        }
        if (!$journeyStartSource) {
            throw new \Exception('Impossible to build a journey');
        }

        $resultList = [];
        $source = $journeyStartSource;
        while (isset($sortedItems[$source])) {
            $item = $sortedItems[$source];
            $resultList[] = $item;
            $source = $item->getDestination();
        }

        $journey->setItems($resultList);
    }
}
