<?php

namespace lib\Response;

class ResponseType
{
    const TYPE_JSON = 'json';

    /**
     * @var string
     */
    protected $name;

    /**
     * ResponseType constructor.
     * @param $type
     * @throws \Exception
     */
    public function __construct($type)
    {
        if (self::TYPE_JSON === $type) {
            $this->name = $type;
        } else {
            throw new \Exception('Undefined Response Type "' . $type . '"');
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