<?php

namespace Behavioral\ChainOfResponsibility;

class Request
{
    private bool $done = false;
    private string $handler;
    private $id = 0;

    /**
     * Get the value of done
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set the value of done
     *
     * @return  self
     */
    public function setDone($done)
    {
        $this->done = $done;
    }

    /**
     * Get the value of handler
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * Set the value of handler
     *
     * @return  self
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
