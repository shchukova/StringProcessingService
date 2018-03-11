<?php

namespace lib\StringProcessing;

abstract class AbstractMethod
{
    /**
     * @var AbstractMethod
     */
    protected $nextMethod;

    /**
     * AbstractMethod constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param AbstractMethod $handler
     */
    public function setNextMethod(AbstractMethod $handler)
    {
        if ($this->nextMethod === null) {
            $this->nextMethod = $handler;
        } else {
            $this->nextMethod->setNextMethod($handler);
        }
    }

    /**
     * @param $text
     * @return string
     */
    protected function visitNext($text)
    {
        if ($this->nextMethod !== null) {
            $text = $this->nextMethod->process($text);
        }
        return $text;
    }

    /**
     * @return AbstractMethod
     */
    public function getNextMethod()
    {
        return $this->nextMethod;
    }

    /**
     * @param $text
     * @return string
     */
    abstract public function process($text);

    /**
     * @return string
     */
    abstract public function getMethodType();
}