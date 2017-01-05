<?php
namespace Maxmode\TravelSorter\Tests\Service;

use Maxmode\TravelSorter\Service\Journey;

/**
 * Test for Maxmode\TravelSorter\Service\Journey
 */
class JourneyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Journey
     */
    protected $_service;

    /**
     * @var  Journey\Serializer
     */
    protected $_serializer;

    protected function setUp()
    {
        $this->_service = new Journey();
        $this->_serializer = new Journey\Serializer();
    }

    /**
     * @param array $inputList
     * @param array $expectedlist
     *
     * @dataProvider sortJourneyDataProvider
     */
    public function testSortJourney($inputList, $expectedlist)
    {
        $journey = $this->_serializer->fromArrayToJourney($inputList);
        $this->_service->sortJourney($journey);
        $actualList = $this->_serializer->fromJourneyToArray($journey);

        $this->assertEquals(
            json_encode($expectedlist, JSON_PRETTY_PRINT),
            json_encode($actualList, JSON_PRETTY_PRINT)
        );
    }

    /**
     * @return array
     */
    public function sortJourneyDataProvider()
    {
        return [
            'case 1' => [
                'inputList' => [
                    [
                        'source' => 'A',
                        'destination' => 'B',
                        'means' => 'train x12',
                        'seat' => '18C',
                    ],
                    [
                        'source' => 'C',
                        'destination' => 'D',
                        'means' => 'airport bus',
                        'seat' => 'no seat assignment',
                    ],
                    [
                        'source' => 'B',
                        'destination' => 'C',
                        'means' => 'train T13',
                        'seat' => '12B',
                    ],
                    [
                        'source' => 'D',
                        'destination' => 'E',
                        'means' => 'Flight PS101',
                        'seat' => '25F',
                    ],
                ],
                'expectedlist' => [
                    [
                        'source' => 'A',
                        'destination' => 'B',
                        'means' => 'train x12',
                        'seat' => '18C',
                    ],
                    [
                        'source' => 'B',
                        'destination' => 'C',
                        'means' => 'train T13',
                        'seat' => '12B',
                    ],
                    [
                        'source' => 'C',
                        'destination' => 'D',
                        'means' => 'airport bus',
                        'seat' => 'no seat assignment',
                    ],
                    [
                        'source' => 'D',
                        'destination' => 'E',
                        'means' => 'Flight PS101',
                        'seat' => '25F',
                    ],
                ],
            ],
        ];
    }
}
