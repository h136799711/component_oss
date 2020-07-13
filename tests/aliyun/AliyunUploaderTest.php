<?php

require_once "../../vendor/autoload.php";

$cfg = new \byTest\aliyun\DemoConfig();
$cfg->setEndPoint("http://oss-cn-beijing.aliyuncs.com");
$cfg->setBucket("aliyun-cdn-xxx-cn");
$cfg->setAppKey("");
$cfg->setAppSecret("");
$uploader = new \by\component\aliyun\AliyunOss($cfg);
//$cb = "https://www.taobao.com";
$cb = "";
$params = [
    'username' => "",
    'password' => '123456',
];

$path = dirname(__DIR__) . "/qiniu/demo.png";
$result = $uploader->putObject("book/demo-" . time(), $path, $cb, $params);
//        $result = $uploader->putFile("demo_".time(), $path);
var_dump($result);
$data = $result->getData();

//        $objectKey = $data['object_key'];
//        $signUrl = $uploader->signUrl($objectKey);
//        var_dump($signUrl);

function testIndex()
{

//        $this->markTestSkipped("this is a skipped test.");
//        $uploader = new AliyunOss(new DemoConfig());
//        $cb = "http://rrgc.8raw.com/api.php/callback/index";
//        $params = [
//            'username'=>"hebidu",
//            'password' => '123456',
//        ];
//        $result = $uploader->putObject("demo-".time(), date('Y-m-d H:i:s'), $cb, $params);
//        var_dump($result);
//        $data = $result->getData();
//        $objectKey = $data['object_key'];
//        $signUrl = $uploader->signUrl($objectKey);
//        var_dump($signUrl);
}
