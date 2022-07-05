<?php

namespace Structural\Facade\Converterlib;

class ColorCorrection
{
    public function correctColor(Photo $photo)
    {
        return $photo . "color_correction";
    }
}
