<?php

namespace lib\Response;

use lib\Data\Content;

interface IResponse
{
    /**
     * @param Content $content
     * @return string
     */
    public function getFormat(Content $content);
}