<?php

namespace lib\StringProcessing\Method;

use lib\StringProcessing\AbstractMethod;
use lib\StringProcessing\MethodType;

class MethodReplaceSpacesToEOL extends AbstractMethod
{
    /**
     * @param string $text
     * @return string
     */
    public function process($text)
    {
        $text = str_replace(' ', PHP_EOL, $text);
        return $this->visitNext($text);
    }

    public function getMethodType()
    {
        return MethodType::METHOD_REPLACE_SPACES_TO_EOL;
    }
}