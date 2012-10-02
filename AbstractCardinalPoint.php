<?php

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
abstract class AbstractCardinalPoint
{
    protected $cardinalPoint;
    
    public function __toString()
    {
        return $this->cardinalPoint;
    }
    
    abstract function getLeftCardinalPoint();
}