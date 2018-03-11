<?php

namespace lib\Parser;

interface IWorker
{
    /**
     * @param string $string
     * @return Job
     */
    public function parse($string);
}

