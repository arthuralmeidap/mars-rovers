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
    private $coordinateX;
    private $coordinateY;
    
    private $plateau;
    
    
    public function landOn( MarsPlateau $plateau, $coordinateX, $coordinateY, $cardinalPoint )
    {
        $plateau->landRover($this, $coordinateX, $coordinateY);
        $this->plateau      = $plateau;
        $this->heading      = $cardinalPoint;
        $this->coordinateX  = $coordinateX;
        $this->coordinateY  = $coordinateY;
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
        $coordinateX = $this->coordinateX;
        $coordinateY = $this->coordinateY;
        
        switch ($this->heading)
        {
            case 'N':
                $coordinateY++;
                break;
            case 'S':
                $coordinateY--;
                break;
            case 'W':
                $coordinateX--;
                break;
            case 'E':
                $coordinateX++;
                break;
            default :
                throw new Exception("Incorrect heading: {$this->heading}");
        }
        
        $this->landOn($this->plateau, $coordinateX, $coordinateY, $this->heading);
    }


    public function getActualPosition()
    {
        return array(
            'coordinateX' => $this->coordinateX,
            'coordinateY' => $this->coordinateY,
            'heading' => $this->heading
        );
    }
      
}