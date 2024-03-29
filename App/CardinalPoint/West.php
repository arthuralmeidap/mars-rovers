<?php

namespace App\CardinalPoint;

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class West extends AbstractCardinalPoint
{
    protected $cardinalPoint = 'W';
    
    public function getLeftCardinalPoint()
    {
        return new South();
    }
    
    public function getRightCardinalPoint()
    {
        return new North();
    }
    
    public function calculatePosition( \App\MarsPosition $mPosition )
    {
        $coordinateX = $mPosition->getCoordinateX();
        $coordinateY = $mPosition->getCoordinateY();
        $coordinateX--;
        return new \App\MarsPosition($coordinateX,$coordinateY);
    }
}