<?php

namespace Behavioral\Command;

class GitReciever
{
    private $gitLog = [];


    /**
     * Get the value of gitLog
     */
    public function getGitLog()
    {
        return $this->gitLog;
    }

    public function gitAdd()
    {
        $this->gitLog[] = 'Git - Add';
    }

    public function gitCommit()
    {
        $this->gitLog[] = 'Git - Commit';
    }

    public function gitPush()
    {
        $this->gitLog[] = 'Git - Push';
    }

    public function gitRevert()
    {
        $this->gitLog = ['Git - Revert'];
    }
}
