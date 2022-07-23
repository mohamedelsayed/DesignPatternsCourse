<?php

namespace Behavioral\Command;

class RevertCommand implements Command
{
    private GitReciever $gitReciever;

    public function __construct(GitReciever $gitReciever)
    {
        $this->gitReciever = $gitReciever;
    }

    public function execute()
    {
        $this->gitReciever->gitRevert();
    }
}
{

}
