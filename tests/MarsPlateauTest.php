<?php

require_once '../MarsPlateau.php';

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
}