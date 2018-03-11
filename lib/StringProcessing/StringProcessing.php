<?php

namespace lib\StringProcessing;

use lib\Parser\JobParserFabric;
use lib\Parser\SourceType;
use lib\Response\ResponseFabric;
use lib\Response\ResponseType;

class StringProcessing
{
    /**
     * @var string
     */
    protected $request;

    /**
     * @var SourceType
     */
    protected $sourceType;

    /**
     * @var ResponseType
     */
    protected $responseType;

    /**
     * lib constructor.
     * @param $request
     * @param SourceType $sourceType
     * @param ResponseType $responseType
     */
    public function __construct($request, SourceType $sourceType, ResponseType $responseType)
    {
        $this->request = $request;
        $this->sourceType = $sourceType;
        $this->responseType = $responseType;
    }

    /**
     * @return string
     */
    public function process()
    {
        $parserFabric = new JobParserFabric($this->request, $this->sourceType);
        $parser = $parserFabric->getParser();

        list($text, $methodNames) = $parser->parse();

        $job = Job::createFromArray($text, $methodNames);

        $answer = $job->process();

        $responseFabric = new ResponseFabric();
        $jsonResponse = $responseFabric->getResponse($this->responseType);
        return $jsonResponse->getFormat($answer);
    }
}