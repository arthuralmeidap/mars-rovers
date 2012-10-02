<?php

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class WestCardinalPoint extends AbstractCardinalPoint
{
    protected $cardinalPoint = 'W';
    
    public function getLeftCardinalPoint()
    {
        return new SouthCardinalPoint();
    }
    
    public function getRightCardinalPoint()
    {
        return new NorthCardinalPoint();
    }
}