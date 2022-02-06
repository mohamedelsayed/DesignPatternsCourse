<?php

namespace Creational\ProtoType;

class ManualCarProtoType extends AbastractCarProtoType
{
    protected $model = "Manual";
    public function __clone()
    {
        
    }
}
