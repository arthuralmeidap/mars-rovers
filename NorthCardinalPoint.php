<?php

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class NorthCardinalPoint extends AbstractCardinalPoint
{
    protected $cardinalPoint = 'N';
    
    public function getLeftCardinalPoint()
    {
        return new WestCardinalPoint();
    }
    
}