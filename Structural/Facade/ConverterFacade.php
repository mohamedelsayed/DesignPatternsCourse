<?php

namespace Structural\Facade;

use Structural\Facade\Converterlib\Animator;
use Structural\Facade\Converterlib\ColorCorrection;
use Structural\Facade\Converterlib\GIFConverter;
use Structural\Facade\Converterlib\JPGConverter;
use Structural\Facade\Converterlib\Photo;

class ConverterFacade
{
    public function gifConvert(Photo $photo)
    {

        $animator = new Animator();
        $gifConverter = new GIFConverter($animator);
        return $gifConverter->convertToGIF($photo);
    }

    public function jpgConvert(Photo $photo)
    {
        $colorCorrection = new ColorCorrection();
        $photo->setType($colorCorrection->correctColor($photo));

        $jpgConverter = new JPGConverter();
        return $jpgConverter->convertToJPG($photo);
    }
}
