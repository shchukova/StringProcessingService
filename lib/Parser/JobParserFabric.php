<?php

namespace lib\Parser;

class JobParserFabric
{
    /**
     * @var string
     */
    protected $string;


    /**
     * @var SourceType
     */
    protected $type;

    /**
     * JobParserFabric constructor.
     * @param $string
     * @param SourceType $type
     */
    public function __construct($string, SourceType $type)
    {
        $this->string = $string;
        $this->type = $type;
    }

    /**
     * @return JobParser
     * @throws \Exception
     */
    public function getParser()
    {
        $parser = new JobParser($this->string);
        switch ($this->type->getName()) {
            case SourceType::TYPE_JSON :
                $worker = new JsonWorker();
                break;
            default:
                throw new \Exception('Cant create parser. Unsupported source type "' . $this->type->getName() . '"');

        }
        $parser->setWorker($worker);
        return $parser;
    }
}