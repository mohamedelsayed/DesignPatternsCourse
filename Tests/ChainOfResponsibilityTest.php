<?php

namespace Tests;

use Behavioral\ChainOfResponsibility\AfafHandler;
use Behavioral\ChainOfResponsibility\AliHandler;
use Behavioral\ChainOfResponsibility\MohsenHandler;
use Behavioral\ChainOfResponsibility\Request;
use PHPUnit\Framework\TestCase;

class ChainOfResponsibilityTest extends TestCase
{
    public function testAliCanHandleRequest()
    {
        $ali = new AliHandler();
        $mohsen = new MohsenHandler();
        $afaf = new AfafHandler();
        $afaf->setNext($mohsen);
        $ali->setNext($afaf);
        $request = new Request();
        $request->setId(4);
        $response = $ali->handle($request);
        $this->assertTrue($response->getDone());
        $this->assertEquals(AliHandler::class, $response->getHandler());
    }

    public function testAfafCanHandleRequest()
    {
        $ali = new AliHandler();
        $mohsen = new MohsenHandler();
        $afaf = new AfafHandler();
        $afaf->setNext($mohsen);
        $ali->setNext($afaf);
        $request = new Request();
        $request->setId(9);
        $response = $ali->handle($request);
        $this->assertTrue($response->getDone());
        $this->assertEquals(AfafHandler::class, $response->getHandler());
    }

    public function testMohasenCanHandleRequest()
    {
        $ali = new AliHandler();
        $mohsen = new MohsenHandler();
        $afaf = new AfafHandler();
        $afaf->setNext($mohsen);
        $ali->setNext($afaf);
        $request = new Request();
        $request->setId(27);
        $response = $ali->handle($request);
        $this->assertTrue($response->getDone());
        $this->assertEquals(MohsenHandler::class, $response->getHandler());
    }

    public function testNoOneCanHandleRequest()
    {
        $ali = new AliHandler();
        $mohsen = new MohsenHandler();
        $afaf = new AfafHandler();
        $afaf->setNext($mohsen);
        $ali->setNext($afaf);
        $request = new Request();
        $request->setId(71);
        $response = $ali->handle($request);
        $this->assertFalse($response->getDone());
    }
}
