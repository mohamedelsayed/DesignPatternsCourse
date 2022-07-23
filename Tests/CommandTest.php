<?php

namespace Tests;

use Behavioral\Command\CLIInvoker;
use Behavioral\Command\DeployCommand;
use Behavioral\Command\GitReciever;
use Behavioral\Command\RevertCommand;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    private $invoker;

    protected function setUp(): void
    {
        $this->invoker = new CLIInvoker();
    }

    public function testCanExcuteDeployCommand()
    {
        $reciever = new GitReciever();
        $command = new DeployCommand($reciever);
        $this->invoker->setCommand($command);
        $this->invoker->run();
        self::assertCount(3, $reciever->getGitLog());
        self::assertEquals([
            'Git - Add',
            'Git - Commit',
            'Git - Push'
        ], $reciever->getGitLog());
    }

    public function testCanExcuteRevertCommand()
    {
        $reciever = new GitReciever();
        $command = new DeployCommand($reciever);
        $this->invoker->setCommand($command);
        $this->invoker->run();
        $command = new RevertCommand($reciever);
        $this->invoker->setCommand($command);
        $this->invoker->run();
        self::assertCount(1, $reciever->getGitLog());
        self::assertEquals([
            'Git - Revert'
        ], $reciever->getGitLog());
    }
}
