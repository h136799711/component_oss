<?php
/**
 * Created by PhpStorm.
 * User: itboye
 * Date: 2018/8/1
 * Time: 18:38
 */

namespace byTest\aliyun;


use by\component\aliyun\AbstractAliyunConfig;

class DemoConfig extends AbstractAliyunConfig
{
    public function __construct()
    {
        $this->setAppKey("HBDLTAIkYSUxlIbszea");
        $this->setAppSecret("h15Rg7ePCc7oXjqM7MQqz70QMBwzOE");
        $this->setEndPoint("http://oss-cn-beijing.aliyuncs.com");
        $this->setBucket("aliyun-cdn-hebidu-cn");
    }
}