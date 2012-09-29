<?php

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class MarsPlateau
{
    private $maxCoordinateX;
    private $maxCoordinateY;
    private $plateau;
    
    /**
     * Initializes the plateau with the size
     * 
     * @param int $maxCoordinateX
     * @param int $maxCoordinateY
     * @throws Exception 
     */
    public function __construct( $maxCoordinateX, $maxCoordinateY )
    {
        $maxCoordinateX = (int) $maxCoordinateX;
        $maxCoordinateY = (int) $maxCoordinateY;
        
        if( ($maxCoordinateX <= 0) || ($maxCoordinateY <= 0) )
        {
            throw new Exception('The size of plateau must be a valid integer');
        }
        
        $this->maxCoordinateX = $maxCoordinateX;
        $this->maxCoordinateY = $maxCoordinateY;
    }
    
    public function getPosition($coordinateX, $coordinateY)
    {
        
    }
}