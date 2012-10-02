<?php

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class SouthCardinalPoint extends AbstractCardinalPoint
{
    protected $cardinalPoint = 'S';
    
    public function getLeftCardinalPoint()
    {
        return new EastCardinalPoint();
    }
}