<?php

namespace App\CardinalPoint;

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class South extends AbstractCardinalPoint
{
    protected $cardinalPoint = 'S';
    
    public function getLeftCardinalPoint()
    {
        return new East();
    }
    
    public function getRightCardinalPoint()
    {
        return new West();
    }
    
    public function calculatePosition( \App\MarsPosition $mPosition )
    {
        $coordinateX = $mPosition->getCoordinateX();
        $coordinateY = $mPosition->getCoordinateY();
        $coordinateY--;
        return new \App\MarsPosition($coordinateX,$coordinateY);
    }
}