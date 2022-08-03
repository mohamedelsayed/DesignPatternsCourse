<?php

namespace Behavioral\Memento;

class Originator
{
    private $codeFile;
    public function __construct()
    {
        $this->codeFile = new CodeFile();
    }

    public function addNewEcho()
    {
        $this->codeFile->addNewLine('echo "Hello World!";');
    }

    public function addNewVar() {
        $this->codeFile->addNewLine('$x = 15;');
    }
    
    public function save():MementoInterface {
        return new ConcreteMemento(clone $this->codeFile);
    }

    public function ctrlZ(MementoInterface $memento) {
        $this->codeFile = $memento->getSnapshot();
    }

    /**
     * Get the value of codeFile
     */ 
    public function getCodeFile()
    {
        return $this->codeFile;
    }
}
