<?php

namespace Structural\Facade\Converterlib;

class Animator
{
    public function animatePhoto(photo $photo)
    {
        return $photo . "-animate";
    }
}
