<?php

namespace test\unit;

use lib\Parser\SourceType;
use lib\Response\ResponseType;
use lib\StringProcessing\StringProcessing;

class StringProcessingTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param string $request
     * @param string $response
     * @dataProvider testProcessProvider
     */
    public function testProcess($request, $response)
    {
        $sourceType = new SourceType('json');
        $responseType = new ResponseType('json');

        $obj = new StringProcessing($request, $sourceType, $responseType);

        $result = $obj->process();

        self::assertEquals($response, $obj->process());
    }

    public function testProcessProvider()
    {
        return array(
            array('{
                    "job": {
                        "text": "<a    href=\"test@test.ru\">    test@test.ru   </a>   TEST",
                        "methods": [
                            "stripTags",  "removeSpaces", "replaceSpacesToEol", "removeSymbols"
                            ]
                        }
                    }',
                '{
                    "text": testtest.ruTEST
                 }'
            )
        );
    }
}
