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
        return "DAC3vYkwngqgnInHoStopnFDPZtHwj65nABpXJEV";
    }

    public function getSecretKey()
    {
        return "0J3ctvv0k9vUPh9swe3g0i7MXQW6plEd2pumYWHL";
    }

    public function getBindDomainName()
    {
        return "http://pcrt17iqg.bkt.clouddn.com";
    }

    public function getDefaultBucket()
    {
        return "cdn-hebidu-cn";
    }

}