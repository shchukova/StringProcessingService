<?php

namespace lib\StringProcessing\Method;

use lib\StringProcessing\AbstractMethod;
use lib\StringProcessing\MethodType;

class MethodHtmlSpecialChars extends AbstractMethod
{
    /**
     * @param string $text
     * @return string
     */
    public function process($text)
    {
        $text = htmlspecialchars($text);

        return $this->visitNext($text);
    }

    public function getMethodType()
    {
        return MethodType::METHOD_HTML_SPECIAL_CHARS;
    }
}