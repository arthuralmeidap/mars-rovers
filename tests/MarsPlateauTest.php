<?php

require_once '../MarsPlateau.php';
require_once '../MarsRover.php';

/**
 *
 * @author Arthur <arthur.almeidapereira@gmail.com>
 */
class MarsPlateauTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Exception
     */
    public function testPlateauMustNotBeCreateWithoutSize()
    {
        $plateau = new MarsPlateau();
    }
    
    public function testShouldLandARoverInPosition()
    {
        $plateau = new MarsPlateau(5,5);
        $mRover  = new MarsRover();
        
        $plateau->landRover($mRover, 1, 2);
        $this->assertEquals($mRover, $plateau->getPosition(1, 2));
    }
}