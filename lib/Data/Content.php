<?php

namespace lib\Data;

class Content
{

    /**
     * @var string
     */
    protected $text;

    /**
     * Content constructor.
     * @param string $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

}