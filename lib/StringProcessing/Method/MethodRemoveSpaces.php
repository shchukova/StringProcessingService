<?php

namespace lib\StringProcessing\Method;

use lib\StringProcessing\AbstractMethod;
use lib\StringProcessing\MethodType;

class MethodRemoveSpaces extends AbstractMethod
{
    /**
     * @param string $text
     * @return string
     */
    public function process($text)
    {
        $text = str_replace(" ","", $text);
        return $this->visitNext($text);
    }

    public function getMethodType()
    {
        return MethodType::METHOD_REMOVE_SPACES;
    }
}