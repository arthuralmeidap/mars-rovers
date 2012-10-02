<?php

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class SouthCardinalPoint
{
    private $cardinalPoint = 'S';
    
    public function __toString()
    {
        return $this->cardinalPoint;
    }
    
    public function getLeftCardinalPoint()
    {
        return new EastCardinalPoint();
    }
}