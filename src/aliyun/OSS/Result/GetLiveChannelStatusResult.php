<?php

namespace by\component\aliyun\OSS\Result;

use by\component\aliyun\OSS\Model\GetLiveChannelStatus;

class GetLiveChannelStatusResult extends Result
{
    /**
     * @return
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        $channelList = new GetLiveChannelStatus();
        $channelList->parseFromXml($content);
        return $channelList;
    }
}
