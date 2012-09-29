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
    }
}