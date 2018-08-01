<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-11-27 18:17
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace byTest\qiniu;


use by\component\qiniu\QiniuDemoConfig;
use by\component\qiniu\QiniuUploader;
use PHPUnit\Framework\TestCase;


class QiniuUploaderTest extends TestCase
{

    /**
     * @throws \Exception
     */
    public function testUpload()
    {
        $config = new QiniuDemoConfig();
        $uploader = new QiniuUploader($config);
        $result = $uploader->uploadToken($config->getDefaultBucket());
        if ($result->isFail()) {
            echo "报错\n";
            var_dump($result);
            exit;
        }

        $this->assertNotEmpty($result->getData());
        $upToken = $result->getData();
        $path = dirname(__DIR__)."/qiniu/demo.png";
        $result = $uploader->putFile($upToken, "demo-".date('YmdHis'), $path);
        var_dump($result);
    }
}