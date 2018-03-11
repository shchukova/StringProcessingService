<?php

namespace lib\StringProcessing;

use lib\Data\Content;

class Job
{

    /**
     * @var Content
     */
    protected $content;

    /**
     * @var AbstractMethod
     */
    protected $firstMethod = null;

    /**
     * Job constructor.
     * @param Content $content
     * @param AbstractMethod|null $firstMethod
     */
    public function __construct(Content $content, AbstractMethod $firstMethod = null)
    {
        $this->content = $content;
        $this->firstMethod = $firstMethod;
    }

    /**
     * @return Content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return null|AbstractMethod
     */
    public function getFirstMethod()
    {
        return $this->firstMethod;
    }

    /**
     * @param $text
     * @param array $methods
     * @return Job
     */
    public static function createFromArray($text, array $methods)
    {
        $content = new Content($text);
        $fabricMethod = new MethodFabric();
        $firstMethod = null;
        foreach ($methods as $name) {
            $method = $fabricMethod->getMethod(new MethodType($name));
            if ($firstMethod === null) {
                $firstMethod = $method;
            } else {
                $firstMethod->setNextMethod($method);
            }
        }
        return new self($content, $firstMethod);
    }

    public function getMethodsAsArray()
    {
        $methods = array();
        $method = $this->firstMethod;
        while (null !== $method) {
            $methods[] = $method->getMethodType();
            $method = $method->getNextMethod();
        }
        return $methods;
    }

    /**
     * @return Content
     */
    public function process()
    {
        if ($this->firstMethod !== null) {
            $newText = $this->firstMethod->process($this->content->getText());
        }

        return new Content($newText);
    }


}