<?php

namespace lib\StringProcessing;

use lib\StringProcessing\Method\MethodHtmlSpecialChars;
use lib\StringProcessing\Method\MethodRemoveSpaces;
use lib\StringProcessing\Method\MethodRemoveSymbols;
use lib\StringProcessing\Method\MethodReplaceSpacesToEOL;
use lib\StringProcessing\Method\MethodStripTags;

class MethodFabric
{

    /**
     * MethodFabric constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param MethodType $methodType
     * @return MethodRemoveSpaces|MethodReplaceSpacesToEOL|MethodStripTags
     * @throws \Exception
     */
    public function getMethod(MethodType $methodType)
    {
        switch ($methodType->getName()) {
            case MethodType::METHOD_STRIP_TAGS:
                return new MethodStripTags();
            case MethodType::METHOD_REPLACE_SPACES_TO_EOL:
                return new MethodReplaceSpacesToEOL();
            case MethodType::METHOD_REMOVE_SPACES:
                return new MethodRemoveSpaces();
            case MethodType::METHOD_HTML_SPECIAL_CHARS:
                return new MethodHtmlSpecialChars();
            case MethodType::METHOD_REMOVE_SYMBOLS:
                return new MethodRemoveSymbols();
            default:
                throw new \Exception('Unsupported Method Type "' . $methodType->getName() . '"');
        }
    }

}