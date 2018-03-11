<?php

namespace test\unit;

use lib\Parser\JsonWorker;

class JsonWorkerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param string $jsonRequest
     * @param string $text
     * @param array $methods
     * @dataProvider testParseProvider
     */
    public function testParse($jsonRequest, $text, array $methods)
    {
        $obj = new JsonWorker();
        $response = $obj->parse($jsonRequest);
        self::assertEquals($text, $response[0]);
        self::assertEquals($methods, $response[1]);
    }

    public function testParseProvider()
    {
        return array(
            array('{
                    "job": {
                        "text": "Text Text",
                        "methods": [
                            "stripTags", "removeSpaces"
                        ]
                       }
                    }',
                'Text Text',
                array("stripTags", "removeSpaces")
            ),
        );
    }
}
