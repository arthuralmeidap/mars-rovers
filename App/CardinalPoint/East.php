<?php

namespace App\CardinalPoint;

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class East extends AbstractCardinalPoint
{
    protected $cardinalPoint = 'E';
    
    public function getLeftCardinalPoint()
    {
        return new North();
    }
    
    public function getRightCardinalPoint()
    {
        return new South();
    }
    
    public function calculatePosition( \App\MarsPosition $mPosition )
    {
        $coordinateX = $mPosition->getCoordinateX();
        $coordinateY = $mPosition->getCoordinateY();
        $coordinateX++;
        return new \App\MarsPosition($coordinateX,$coordinateY);
    }
    
}