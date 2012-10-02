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
                    $this->_moveLeft();
                    break;
                case 'R':
                    $this->_moveRight();
                    break;
                case 'M':
                    $this->_moveFoward();
                    break;
                default :
                    throw new Exception("Incorrect movement: {$path}");
            }
        }
    }
    
    private function _moveLeft()
    {
        switch ($this->heading)
        {
            case 'N':
                $this->heading = 'W';
                break;
            case 'S':
                $this->heading = 'E';
                break;
            case 'W':
                $this->heading = 'S';
                break;
            case 'E':
                $this->heading = 'N';
                break;
            default :
                throw new Exception("Incorrect heading: {$this->heading}");
        }
    }
    
    private function _moveRight()
    {
        switch ($this->heading)
        {
            case 'N':
                $this->heading = 'E';
                break;
            case 'S':
                $this->heading = 'W';
                break;
            case 'W':
                $this->heading = 'N';
                break;
            case 'E':
                $this->heading = 'S';
                break;
            default :
                throw new Exception("Incorrect heading: {$this->heading}");
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