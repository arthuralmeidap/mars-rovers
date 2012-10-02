<?php

require_once '../MarsPlateau.php';
require_once '../MarsRover.php';
require_once '../AbstractCardinalPoint.php';
require_once '../NorthCardinalPoint.php';
require_once '../SouthCardinalPoint.php';
require_once '../EastCardinalPoint.php';
require_once '../WestCardinalPoint.php';

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
        $rover->landOn($this->plateau, 1,2,new NorthCardinalPoint());
        
        $this->assertEquals( $rover, $this->plateau->getPosition(1,2));
        $this->assertEquals( new NorthCardinalPoint(), $rover->getHeading());
    }
    
    public function testRoverShouldTurnToTheLeft()
    {
        $rover1 = new MarsRover();
        $rover2 = new MarsRover();
        $rover3 = new MarsRover();
        $rover4 = new MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,new NorthCardinalPoint());
        $rover2->landOn($this->plateau, 1,2,new SouthCardinalPoint());
        $rover3->landOn($this->plateau, 1,2,new EastCardinalPoint());
        $rover4->landOn($this->plateau, 1,2,new WestCardinalPoint());

        $rover1->move('L');
        $rover2->move('L');
        $rover3->move('L');
        $rover4->move('L');
        
        $this->assertInstanceOf('WestCardinalPoint', $rover1->getHeading());
        $this->assertInstanceOf('EastCardinalPoint', $rover2->getHeading());
        $this->assertInstanceOf('NorthCardinalPoint', $rover3->getHeading());
        $this->assertInstanceOf('SouthCardinalPoint', $rover4->getHeading());
    }
    
    public function testRoverShouldTurnToTheRight()
    {
        $rover1 = new MarsRover();
        $rover2 = new MarsRover();
        $rover3 = new MarsRover();
        $rover4 = new MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,new NorthCardinalPoint());
        $rover2->landOn($this->plateau, 1,2,new SouthCardinalPoint());
        $rover3->landOn($this->plateau, 1,2,new EastCardinalPoint());
        $rover4->landOn($this->plateau, 1,2,new WestCardinalPoint());

        $rover1->move('R');
        $rover2->move('R');
        $rover3->move('R');
        $rover4->move('R');

        $this->assertEquals(new EastCardinalPoint(), $rover1->getHeading());
        $this->assertEquals(new WestCardinalPoint(), $rover2->getHeading());
        $this->assertEquals(new SouthCardinalPoint(), $rover3->getHeading());
        $this->assertEquals(new NorthCardinalPoint(), $rover4->getHeading());
    }
    
    public function testRoverShouldMoveFoward()
    {
        $rover1 = new MarsRover();
        $rover2 = new MarsRover();
        $rover3 = new MarsRover();
        $rover4 = new MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,new NorthCardinalPoint());
        $rover2->landOn($this->plateau, 2,1,new SouthCardinalPoint());
        $rover3->landOn($this->plateau, 3,3,new EastCardinalPoint());
        $rover4->landOn($this->plateau, 4,5,new WestCardinalPoint());

        $rover1->move('M');
        $rover2->move('M');
        $rover3->move('M');
        $rover4->move('M');
         
        $resultPosition1 = array(
            'coordinateX' => 1,
            'coordinateY' => 3,
            'heading'     => new NorthCardinalPoint()
        );
        
        $resultPosition2 = array(
            'coordinateX' => 2,
            'coordinateY' => 0,
            'heading'     => new SouthCardinalPoint()
        );
        
        $resultPosition3 = array(
            'coordinateX' => 4,
            'coordinateY' => 3,
            'heading'     => new EastCardinalPoint()
        );
        
        $resultPosition4 = array(
            'coordinateX' => 3,
            'coordinateY' => 5,
            'heading'     => new WestCardinalPoint()
        );
         
         $this->assertEquals($resultPosition1, $rover1->getActualPosition());
         $this->assertEquals($resultPosition2, $rover2->getActualPosition());
         $this->assertEquals($resultPosition3, $rover3->getActualPosition());
         $this->assertEquals($resultPosition4, $rover4->getActualPosition());
    }
    
    public function testRoverShouldDoMoreThanOneMove()
    {
        $rover1 = new MarsRover();
        $rover1->landOn($this->plateau, 1,2,new NorthCardinalPoint());
        $rover1->move('LMLMLMLMM');
        
        $resultPosition1 = array(
            'coordinateX' => 1,
            'coordinateY' => 3,
            'heading'     => new NorthCardinalPoint()
        );
         
        $this->assertEquals($resultPosition1, $rover1->getActualPosition());
    }


    public function testRoverShouldWalkOnPlateau()
    {
        $rover1 = new MarsRover();
        $rover2 = new MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,new NorthCardinalPoint());
        $rover2->landOn($this->plateau, 3,3,new EastCardinalPoint());
        
        $rover1->move('LMLMLMLMM');
        $rover2->move('MMRMMRMRRM');
        
        $resultPosition1 = array(
            'coordinateX' => 1,
            'coordinateY' => 3,
            'heading'     => new NorthCardinalPoint()
        );
        
        $resultPosition2 = array(
            'coordinateX' => 5,
            'coordinateY' => 1,
            'heading'     => new EastCardinalPoint()
        );
        
        $this->assertEquals( $resultPosition1, $rover1->getActualPosition());
        $this->assertEquals( $resultPosition2, $rover2->getActualPosition());
    }
}