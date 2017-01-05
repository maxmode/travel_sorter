<?php
namespace Maxmode\TravelSorter\Model\Journey;

/**
 * Item model
 */
class Item
{
    /**
     * @var string
     */
    protected $_source;

    /**
     * @var string
     */
    protected $_destination;

    /**
     * @var string
     */
    protected $_means;

    /**
     * @var string
     */
    protected $_seat;

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->_source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->_source = $source;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->_destination;
    }

    /**
     * @param string $destination
     */
    public function setDestination($destination)
    {
        $this->_destination = $destination;
    }

    /**
     * @return string
     */
    public function getMeans()
    {
        return $this->_means;
    }

    /**
     * @param string $means
     */
    public function setMeans($means)
    {
        $this->_means = $means;
    }

    /**
     * @return string
     */
    public function getSeat()
    {
        return $this->_seat;
    }

    /**
     * @param string $seat
     */
    public function setSeat($seat)
    {
        $this->_seat = $seat;
    }
}
