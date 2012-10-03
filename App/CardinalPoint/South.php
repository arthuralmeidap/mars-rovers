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
}