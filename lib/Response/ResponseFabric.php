<?php

namespace lib\Response;

class ResponseFabric
{

    /**
     * ResponseFabric constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param ResponseType $responseType
     * @return IResponse
     * @throws \Exception
     */
    public function getResponse(ResponseType $responseType)
    {
        if (ResponseType::TYPE_JSON === $responseType->getName()) {
            return new JsonResponse();
        }
        throw new \Exception('Cant create Response. Unsupported type ' . $responseType->getName());
    }

}