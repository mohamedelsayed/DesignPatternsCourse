<?php

namespace Behavioral\Command;

class DeployCommand implements Command
{
    private GitReciever $gitReciever;

    public function __construct(GitReciever $gitReciever)
    {
        $this->gitReciever = $gitReciever;
    }

    public function execute()
    {
        $this->gitReciever->gitAdd();

        $this->gitReciever->gitCommit();
        $this->gitReciever->gitPush();
    }
}
