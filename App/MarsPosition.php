<?php

namespace App;

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class MarsPosition
{
    private $coordinateX;
    private $coordinateY;
    
    public function __construct( $coordinateX, $coordinateY )
    {
        $this->coordinateX = $coordinateX;
        $this->coordinateY = $coordinateY;
    }
    
    public function getCoordinateX()
    {
        return $this->coordinateX;
    }
    
    public function getCoordinateY()
    {
        return $this->coordinateY;
    }
}