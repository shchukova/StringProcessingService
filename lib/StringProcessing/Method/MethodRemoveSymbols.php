<?php

namespace lib\StringProcessing\Method;

use lib\StringProcessing\AbstractMethod;
use lib\StringProcessing\MethodType;

class MethodRemoveSymbols extends AbstractMethod
{
    /**
     * @param string $text
     * @return string
     */
    public function process($text)
    {
        foreach ($this->getRemoveSymbols() as $symbol) {
            $text = str_replace($symbol, '', $text);
        }

        return $this->visitNext($text);
    }

    public function getMethodType()
    {
        return MethodType::METHOD_REMOVE_SYMBOLS;
    }

    protected function getRemoveSymbols()
    {
        return array(
            '[', '.', ',', '/', '!', '@', '#', '$', '%', '&', '*', '(', ')', ']'
        );
    }
}