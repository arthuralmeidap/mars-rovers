<?php

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class NorthCardinalPoint
{
    private $cardinalPoint = 'N';
    
    public function __toString()
    {
        return $this->cardinalPoint;
    }
    
    public function getLeftCardinalPoint()
    {
        return new WestCardinalPoint();
    }
    
}