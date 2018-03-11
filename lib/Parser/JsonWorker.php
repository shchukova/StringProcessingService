<?php

namespace lib\Parser;

class JsonWorker implements IWorker
{

    /**
     * @param string $string
     * @return array
     * @throws \Exception
     */
    public function parse($string)
    {
        $parsed = json_decode($string, true);

        if ($error = json_last_error()) {
            $errorReference = [
                JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded.',
                JSON_ERROR_STATE_MISMATCH => 'Invalid or malformed JSON.',
                JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded.',
                JSON_ERROR_SYNTAX => 'Syntax error.',
                JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded.',
                JSON_ERROR_RECURSION => 'One or more recursive references in the value to be encoded.',
                JSON_ERROR_INF_OR_NAN => 'One or more NAN or INF values in the value to be encoded.',
                JSON_ERROR_UNSUPPORTED_TYPE => 'A value of a type that cannot be encoded was given.',
            ];
            $errStr = isset($errorReference[$error]) ? $errorReference[$error] : "Unknown error ($error)";
            throw new \Exception("JSON decode error ($error): $errStr");
        }
        $text = isset($parsed['job']['text']) ? $parsed['job']['text'] : '';
        $methods = isset($parsed['job']['methods']) && is_array($parsed['job']['methods']) ? $parsed['job']['methods'] : array();

        return array($text, $methods);
    }
}