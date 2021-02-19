<?php

namespace by\component\aliyun\OSS\Result;

use by\component\aliyun\OSS\Model\CnameConfig;

class GetCnameResult extends Result
{
    /**
     * @return CnameConfig
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        $config = new CnameConfig();
        $config->parseFromXml($content);
        return $config;
    }
}
