<?php

namespace test\unit;

use lib\StringProcessing\Job;

class JobTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param $text
     * @param array $methods
     * @dataProvider testCreateFromArrayProvider
     */
    public function testCreateFromArray($text, array $methods)
    {
        $job = Job::createFromArray($text, $methods);
        self::assertEquals($methods, $job->getMethodsAsArray());
    }

    public function testCreateFromArrayProvider()
    {
        return array(
            array('Text Text', array('stripTags', 'removeSpaces', 'replaceSpacesToEol')
            ),
        );
    }
}
