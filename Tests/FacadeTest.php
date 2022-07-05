<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Structural\Facade\ConverterFacade;
use Structural\Facade\Converterlib\Photo;

class FacadeTest extends TestCase
{
    private $facade;
    protected function setUp(): void
    {
        $this->facade = new ConverterFacade();
    }
    public function testCanConvertToGIF()
    {
        $photo = new Photo();
        $this->facade->gifConvert($photo);
        // $this->addToAssertionCount(1);
        $this->assertEquals('-GIF-animate', $photo->getType());
    }

    public function testCanConvertToJPG()
    {
        $photo = new Photo();
        $this->facade->jpgConvert($photo);
        $this->assertEquals('color_correction-JPG', $photo->getType());
    }
}
