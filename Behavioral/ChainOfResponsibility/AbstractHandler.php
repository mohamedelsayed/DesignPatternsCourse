<?php

namespace Behavioral\ChainOfResponsibility;

abstract class AbstractHandler implements HandlerInterface
{
    private ?HandlerInterface $next = null;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->next = $handler;
        return $handler;
    }

    public function handle(Request $request)
    {
        if ($this->next) {
            return $this->next->handle($request);
        }
        return $request;
    }
}
