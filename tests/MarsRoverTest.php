<?php

require_once 'bootstrap.php';

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
        $this->plateau = new \App\MarsPlateau(5,5);
    }

    public function testRoverShouldLandOnPositionAndHeadingNorth()
    {
        $rover = new \App\MarsRover();
        $rover->landOn($this->plateau, 1,2,new \App\CardinalPoint\North());
        
        $this->assertEquals( $rover, $this->plateau->getPosition(1,2));
        $this->assertEquals( new \App\CardinalPoint\North(), $rover->getHeading());
    }
    
    public function testRoverShouldTurnToTheLeft()
    {
        $rover1 = new \App\MarsRover();
        $rover2 = new \App\MarsRover();
        $rover3 = new \App\MarsRover();
        $rover4 = new \App\MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,new \App\CardinalPoint\North());
        $rover2->landOn($this->plateau, 1,2,new \App\CardinalPoint\South());
        $rover3->landOn($this->plateau, 1,2,new \App\CardinalPoint\East());
        $rover4->landOn($this->plateau, 1,2,new \App\CardinalPoint\West());

        $rover1->move('L');
        $rover2->move('L');
        $rover3->move('L');
        $rover4->move('L');
        
        $this->assertInstanceOf('\App\CardinalPoint\West', $rover1->getHeading());
        $this->assertInstanceOf('\App\CardinalPoint\East', $rover2->getHeading());
        $this->assertInstanceOf('\App\CardinalPoint\North', $rover3->getHeading());
        $this->assertInstanceOf('\App\CardinalPoint\South', $rover4->getHeading());
    }
    
    public function testRoverShouldTurnToTheRight()
    {
        $rover1 = new \App\MarsRover();
        $rover2 = new \App\MarsRover();
        $rover3 = new \App\MarsRover();
        $rover4 = new \App\MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,new \App\CardinalPoint\North());
        $rover2->landOn($this->plateau, 1,2,new \App\CardinalPoint\South());
        $rover3->landOn($this->plateau, 1,2,new \App\CardinalPoint\East());
        $rover4->landOn($this->plateau, 1,2,new \App\CardinalPoint\West());

        $rover1->move('R');
        $rover2->move('R');
        $rover3->move('R');
        $rover4->move('R');

        $this->assertEquals(new \App\CardinalPoint\East(), $rover1->getHeading());
        $this->assertEquals(new \App\CardinalPoint\West(), $rover2->getHeading());
        $this->assertEquals(new \App\CardinalPoint\South(), $rover3->getHeading());
        $this->assertEquals(new \App\CardinalPoint\North(), $rover4->getHeading());
    }
    
    public function testRoverShouldMoveFoward()
    {
        $rover1 = new \App\MarsRover();
        $rover2 = new \App\MarsRover();
        $rover3 = new \App\MarsRover();
        $rover4 = new \App\MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,new \App\CardinalPoint\North());
        $rover2->landOn($this->plateau, 2,1,new \App\CardinalPoint\South());
        $rover3->landOn($this->plateau, 3,3,new \App\CardinalPoint\East());
        $rover4->landOn($this->plateau, 4,5,new \App\CardinalPoint\West());

        $rover1->move('M');
        $rover2->move('M');
        $rover3->move('M');
        $rover4->move('M');
         
        $resultPosition1 = array(
            'coordinateX' => 1,
            'coordinateY' => 3,
            'heading'     => new \App\CardinalPoint\North()
        );
        
        $resultPosition2 = array(
            'coordinateX' => 2,
            'coordinateY' => 0,
            'heading'     => new \App\CardinalPoint\South()
        );
        
        $resultPosition3 = array(
            'coordinateX' => 4,
            'coordinateY' => 3,
            'heading'     => new \App\CardinalPoint\East()
        );
        
        $resultPosition4 = array(
            'coordinateX' => 3,
            'coordinateY' => 5,
            'heading'     => new \App\CardinalPoint\West()
        );
         
         $this->assertEquals($resultPosition1, $rover1->getActualPosition());
         $this->assertEquals($resultPosition2, $rover2->getActualPosition());
         $this->assertEquals($resultPosition3, $rover3->getActualPosition());
         $this->assertEquals($resultPosition4, $rover4->getActualPosition());
    }
    
    public function testRoverShouldDoMoreThanOneMove()
    {
        $rover1 = new \App\MarsRover();
        $rover1->landOn($this->plateau, 1,2,new \App\CardinalPoint\North());
        $rover1->move('LMLMLMLMM');
        
        $resultPosition1 = array(
            'coordinateX' => 1,
            'coordinateY' => 3,
            'heading'     => new \App\CardinalPoint\North()
        );
         
        $this->assertEquals($resultPosition1, $rover1->getActualPosition());
    }


    public function testRoverShouldWalkOnPlateau()
    {
        $rover1 = new \App\MarsRover();
        $rover2 = new \App\MarsRover();
        
        $rover1->landOn($this->plateau, 1,2,new \App\CardinalPoint\North());
        $rover2->landOn($this->plateau, 3,3,new \App\CardinalPoint\East());
        
        $rover1->move('LMLMLMLMM');
        $rover2->move('MMRMMRMRRM');
        
        $resultPosition1 = array(
            'coordinateX' => 1,
            'coordinateY' => 3,
            'heading'     => new \App\CardinalPoint\North()
        );
        
        $resultPosition2 = array(
            'coordinateX' => 5,
            'coordinateY' => 1,
            'heading'     => new \App\CardinalPoint\East()
        );
        
        $this->assertEquals( $resultPosition1, $rover1->getActualPosition());
        $this->assertEquals( $resultPosition2, $rover2->getActualPosition());
    }
}