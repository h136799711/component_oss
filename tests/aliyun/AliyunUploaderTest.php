<?php
/**
 * Created by PhpStorm.
 * User: itboye
 * Date: 2018/8/1
 * Time: 18:37
 */

namespace byTest\aliyun;


use by\component\aliyun\AliyunOss;
use PHPUnit\Framework\TestCase;

class AliyunUploaderTest extends TestCase
{
    public function testPath() {
        $uploader = new AliyunOss(new DemoConfig());
        $cb = "";
        $params = [
            'username'=>"hebidu",
            'password' => '123456',
        ];

        $path = dirname(__DIR__)."/qiniu/demo.png";
        $result = $uploader->putFile("demo-".time(), $path, $cb, $params);
//        $result = $uploader->putFile("demo_".time(), $path);
        var_dump($result);
        $data = $result->getData();

//        $objectKey = $data['object_key'];
//        $signUrl = $uploader->signUrl($objectKey);
//        var_dump($signUrl);
    }

    public function testIndex() {

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
}