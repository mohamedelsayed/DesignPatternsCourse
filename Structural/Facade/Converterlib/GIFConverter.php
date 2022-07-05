<?php

namespace Structural\Facade\Converterlib;

class GIFConverter
{

    public function __construct(Animator $animator)
    {
        $this->animator = $animator;
    }

    public function convertToGIF(Photo $photo)
    {
        $type = $photo->getType() . "-GIF";
        $photo->setType($type);
        $photo->setType($this->animator->animatePhoto($photo));
        return $photo;
    }
}
