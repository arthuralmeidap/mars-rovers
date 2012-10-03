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
}