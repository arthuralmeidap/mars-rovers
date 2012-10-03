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
}