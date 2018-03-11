<?php

namespace lib\Response;

use lib\Data\Content;

class JsonResponse implements IResponse
{
    /**
     * @param Content $content
     * @return string
     */
    public function getFormat(Content $content)
    {
        return '{text: ' . $content->getText() . '}';
    }
}
