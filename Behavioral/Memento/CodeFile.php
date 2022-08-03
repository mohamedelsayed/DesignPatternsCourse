<?php

namespace Behavioral\Memento;

class CodeFile
{
    private $lines = [];
    public function __construct()
    {
        $this->lines[] = '<?php';
    }

    /**
     * Get the value of lines
     */
    public function getLines()
    {
        return $this->lines;
    }

    public function addNewLine(string $line)
    {
        $this->lines[] = $line;
    }
    
}
