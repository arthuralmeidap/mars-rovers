<?php

require_once '../MarsPlateau.php';

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class MarsRover
{
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
                    $this->_moveLeft( $this->heading );
                    break;
                case 'R':
                    $this->_moveRight( $this->heading );
                    break;
                case 'M':
                    $this->_moveFoward();
                    break;
                default :
                    throw new Exception("Incorrect movement: {$path}");
            }
        }
    }
    
    private function _moveLeft( AbstractCardinalPoint $cardinalPoint )
    {
        $this->heading = $cardinalPoint->getLeftCardinalPoint();
    }
    
    private function _moveRight( AbstractCardinalPoint $cardinalPoint )
    {
        $this->heading = $cardinalPoint->getRightCardinalPoint();
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