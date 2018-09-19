<?php
/**
 * Created by PhpStorm.
 * User: itboye
 * Date: 2018/8/1
 * Time: 16:00
 */

namespace by\component\qiniu;


use by\component\qiniu\interfaces\QiniuConfigInterface;

class QiniuDemoConfig implements QiniuConfigInterface
{
    public function getAppKey()
    {
        return "";
    }

    public function getSecretKey()
    {
        return "";
    }

    public function getBindDomainName()
    {
        return "";
    }

    public function getDefaultBucket()
    {
        return "cdn-hebidu-cn";
    }

}