<?php

namespace Creational\ProtoType;

class AutomaticCarProtoType extends AbastractCarProtoType
{
    protected $model = "Automatic";
    public function __clone()
    {
    }
}
