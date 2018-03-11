<?php

namespace lib\StringProcessing\Method;

use lib\StringProcessing\AbstractMethod;
use lib\StringProcessing\MethodType;

class MethodStripTags extends AbstractMethod
{
    /**
     * @param string $text
     * @return string
     */
    public function process($text)
    {
        $text = strip_tags($text);

        return $this->visitNext($text);
    }

    public function getMethodType()
    {
        return MethodType::METHOD_STRIP_TAGS;
    }
}