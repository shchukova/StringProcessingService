<?php

namespace lib\Parser;

class JobParser
{
    /**
     * @var IWorker
     */
    protected $worker;

    /**
     * @var string
     */
    protected $string;

    /**
     * JobParser constructor.
     * @param string $string
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * @param IWorker $worker
     */
    public function setWorker(IWorker $worker)
    {
        $this->worker = $worker;
    }

    /**
     * @return Job
     */
    public function parse()
    {
        return $this->worker->parse($this->string);
    }
}

