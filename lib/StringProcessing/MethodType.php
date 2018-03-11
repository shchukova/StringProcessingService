<?php

namespace lib\StringProcessing;

class MethodType
{
    /**
     * @var string
     */
    protected $name;

    const METHOD_REMOVE_SPACES = 'removeSpaces';

    const METHOD_REPLACE_SPACES_TO_EOL = 'replaceSpacesToEol';

    const METHOD_STRIP_TAGS = 'stripTags';

    const METHOD_HTML_SPECIAL_CHARS = 'htmlspecialchars';

    const METHOD_REMOVE_SYMBOLS = 'removeSymbols';

    /**
     * MethodType constructor.
     * @param $name
     * @throws \Exception
     */
    public function __construct($name)
    {
        if (!in_array($name, $this->getSupportedTypes())) {
            throw new \Exception('Undefined Method "' . $name . "'");
        }
        $this->name = $name;
    }

    /**
     * @return array
     */
    protected function getSupportedTypes()
    {
        return array(
            self::METHOD_STRIP_TAGS,
            self::METHOD_REMOVE_SPACES,
            self::METHOD_REPLACE_SPACES_TO_EOL,
            self::METHOD_HTML_SPECIAL_CHARS,
            self::METHOD_REMOVE_SYMBOLS
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}