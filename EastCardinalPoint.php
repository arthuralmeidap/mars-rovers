<?php

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class EastCardinalPoint
{
    private $cardinalPoint = 'E';
    
    public function __toString()
    {
        return $this->cardinalPoint;
    }
    
    public function getLeftCardinalPoint()
    {
        return new NorthCardinalPoint();
    }
}