<?php

namespace App\CardinalPoint;

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class North extends AbstractCardinalPoint
{
    protected $cardinalPoint = 'N';
    
    public function getLeftCardinalPoint()
    {
        return new West();
    }
    
    public function getRightCardinalPoint()
    {
        return new East();
    }
    
    public function calculatePosition( \App\MarsPosition $mPosition )
    {
        $coordinateX = $mPosition->getCoordinateX();
        $coordinateY = $mPosition->getCoordinateY();
        $coordinateY++;
        return new \App\MarsPosition($coordinateX,$coordinateY);
    }
}