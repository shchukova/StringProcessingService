<?php

$request = isset($_REQUEST['request']) ? $_REQUEST['request'] : '';
$sourceType = new SourceType('json');
$responseType = new ResponseType('json');

$service = new \lib\StringProcessing\StringProcessing($request, $sourceType, $responseType);

echo $service->process();