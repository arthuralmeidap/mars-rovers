<?php

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class WestCardinalPoint
{
    private $cardinalPoint = 'W';
    
    public function __toString()
    {
        return $this->cardinalPoint;
    }
    
    public function getLeftCardinalPoint()
    {
        return new SouthCardinalPoint();
    }
}