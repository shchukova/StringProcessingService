<?php

namespace lib\Parser;

class SourceType
{
    const TYPE_JSON = 'json';

    /**
     * @var string
     */
    private $name;

    /**
     * SourceType constructor.
     * @param string $type
     * @throws \Exception
     */
    public function __construct($type)
    {
        if (self::TYPE_JSON === $type) {
            $this->name = $type;
        }else {
            throw new \Exception('Undefined source type "' . $type . '"');
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}