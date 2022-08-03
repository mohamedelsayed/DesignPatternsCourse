<?php

namespace Behavioral\Memento;

class ConcreteMemento implements MementoInterface
{
    private CodeFile $codeFile;
    public function __construct(CodeFile $codeFile)
    {
        $this->codeFile = $codeFile;
    }
    
    public function getSnapshot()
    {
        return $this->codeFile;
    }
}
