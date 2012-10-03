<?php

namespace App;

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class MarsRover
{
    /**
     *
     * @var AbstractCardinalPoint
     */
    private $heading;
    
    /**
     *
     * @var MarsPosition 
     */
    private $position;
    
    private $plateau;
    
    
    public function landOn( MarsPlateau $plateau, MarsPosition $position, CardinalPoint\AbstractCardinalPoint $cardinalPoint )
    {
        $plateau->landRover($this, $position->getCoordinateX(), $position->getCoordinateY());
        $this->plateau      = $plateau;
        $this->heading      = $cardinalPoint;
        $this->position     = $position;
      
    }
    
    public function getHeading()
    {
        return $this->heading;
    }
    
    public function move( $path )
    {
        $moves = strlen($path);
        
        for( $ct=0;$ct < $moves ; $ct++)
        {
            switch ($path[$ct])
            {
                case 'L':
                    $this->heading = $this->heading->getLeftCardinalPoint();
                    break;
                case 'R':
                    $this->heading = $this->heading->getRightCardinalPoint();
                    break;
                case 'M':
                    $this->_moveFoward();
                    break;
                default :
                    throw new Exception("Incorrect movement: {$path}");
            }
        }
    }
    
    public function _moveFoward()
    {
        $this->landOn($this->plateau, $this->heading->calculatePosition($this->position) , $this->heading);
    }


    public function getActualPosition()
    {
        return array(
            'coordinateX' => $this->position->getCoordinateX(),
            'coordinateY' => $this->position->getCoordinateY(),
            'heading' => $this->heading
        );
    }
      
}