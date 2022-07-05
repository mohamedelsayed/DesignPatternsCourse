<?php

namespace Structural\Facade\Converterlib;

class JPGConverter
{

    public function convertToJPG(Photo $photo)
    {
        $photo->setType($photo . "-JPG");
        return $photo;
    }
}
