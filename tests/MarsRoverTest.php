<?php

require_once '../MarsPlateau.php';
require_once '../MarsRover.php';

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class MarsRoverTest extends PHPUnit_Framework_TestCase
{
    protected $plateau;

    //TODO mock plateau
    public function setUp()
    {
        parent::setUp();
        $this->plateau = new MarsPlateau(5,5);
    }

    public function testRoverShouldLandOnPositionAndHeadingNorth()
    {
        $rover = new MarsRover();
        $rover->landOn($this->plateau, 1,2,'N');
        
        $this->assertEquals( $rover, $this->plateau->getPosition(1,2));
        $this->assertEquals( 'N', $rover->getHeading());
    }
    
    public function testRoverShouldTurnToTheLeft()
    {
        $rover1 = new MarsRover();
        $rover2 = new MarsRover();
        $rover3 = new MarsRover();
        $rover4 = new MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,'N');
        $rover2->landOn($this->plateau, 1,2,'S');
        $rover3->landOn($this->plateau, 1,2,'E');
        $rover4->landOn($this->plateau, 1,2,'W');

        $rover1->move('L');
        $rover2->move('L');
        $rover3->move('L');
        $rover4->move('L');

        $this->assertEquals('W', $rover1->getHeading());
        $this->assertEquals('E', $rover2->getHeading());
        $this->assertEquals('N', $rover3->getHeading());
        $this->assertEquals('S', $rover4->getHeading());
    }
    
    public function testRoverShouldTurnToTheRight()
    {
        $rover1 = new MarsRover();
        $rover2 = new MarsRover();
        $rover3 = new MarsRover();
        $rover4 = new MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,'N');
        $rover2->landOn($this->plateau, 1,2,'S');
        $rover3->landOn($this->plateau, 1,2,'E');
        $rover4->landOn($this->plateau, 1,2,'W');

        $rover1->move('R');
        $rover2->move('R');
        $rover3->move('R');
        $rover4->move('R');

        $this->assertEquals('E', $rover1->getHeading());
        $this->assertEquals('W', $rover2->getHeading());
        $this->assertEquals('S', $rover3->getHeading());
        $this->assertEquals('N', $rover4->getHeading());
    }
    
    public function testRoverShouldMoveFoward()
    {
        $rover1 = new MarsRover();
        $rover2 = new MarsRover();
        $rover3 = new MarsRover();
        $rover4 = new MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,'N');
        $rover2->landOn($this->plateau, 2,1,'S');
        $rover3->landOn($this->plateau, 3,3,'E');
        $rover4->landOn($this->plateau, 4,5,'W');

        $rover1->move('M');
        $rover2->move('M');
        $rover3->move('M');
        $rover4->move('M');
         
        $resultPosition1 = array(
            'coordinateX' => 1,
            'coordinateY' => 3,
            'heading'     => 'N'
        );
        
        $resultPosition2 = array(
            'coordinateX' => 2,
            'coordinateY' => 0,
            'heading'     => 'S'
        );
        
        $resultPosition3 = array(
            'coordinateX' => 4,
            'coordinateY' => 3,
            'heading'     => 'E'
        );
        
        $resultPosition4 = array(
            'coordinateX' => 3,
            'coordinateY' => 5,
            'heading'     => 'W'
        );
         
         $this->assertEquals($resultPosition1, $rover1->getActualPosition());
         $this->assertEquals($resultPosition2, $rover2->getActualPosition());
         $this->assertEquals($resultPosition3, $rover3->getActualPosition());
         $this->assertEquals($resultPosition4, $rover4->getActualPosition());
    }
    
    public function testRoverShouldDoMoreThanOneMove()
    {
        $rover1 = new MarsRover();
        $rover1->landOn($this->plateau, 1,2,'N');
        $rover1->move('LMLMLMLMM');
        
        $resultPosition1 = array(
            'coordinateX' => 1,
            'coordinateY' => 3,
            'heading'     => 'N'
        );
         
        $this->assertEquals($resultPosition1, $rover1->getActualPosition());
    }


    public function testRoverShouldWalkOnPlateau()
    {
        $rover1 = new MarsRover();
        $rover2 = new MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,'N');
        $rover2->landOn($this->plateau, 3,3,'E');
        
        $rover1->move('LMLMLMLMM');
        $rover2->move('MMRMMRMRRM');
        
        $resultPosition1 = array(
            'coordinateX' => 1,
            'coordinateY' => 3,
            'heading'     => 'N'
        );
        
        $resultPosition2 = array(
            'coordinateX' => 5,
            'coordinateY' => 1,
            'heading'     => 'E'
        );
        
        $this->assertEquals( $resultPosition1, $rover1->getActualPosition());
        $this->assertEquals( $resultPosition2, $rover2->getActualPosition());
    }
}