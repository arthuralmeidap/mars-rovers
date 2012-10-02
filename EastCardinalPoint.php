<?php

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class EastCardinalPoint extends AbstractCardinalPoint
{
    protected $cardinalPoint = 'E';
    
    public function getLeftCardinalPoint()
    {
        return new NorthCardinalPoint();
    }
    
    public function getRightCardinalPoint()
    {
        return new SouthCardinalPoint();
    }
}