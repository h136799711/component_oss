<?php
/**
 * Created by PhpStorm.
 * User: itboye
 * Date: 2018/8/1
 * Time: 18:00
 */

namespace by\component\aliyun;


use by\infrastructure\helper\CallResultHelper;
use OSS\Core\OssException;
use OSS\OssClient;

class AliyunOss
{
    /**
     * @var AbstractAliyunConfig
     */
    private $config;

    public function __construct(AbstractAliyunConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param $objectKey
     * @param int $timeout
     * @param string $bucket
     * @return string
     * @throws OssException
     */
    public function signUrl($objectKey, $timeout = 3600, $bucket = '')
    {
        if (empty($bucket)) {
            $bucket = $this->config->getBucket();
        }
        $ossClient = new OssClient($this->config->getAppKey(), $this->config->getAppSecret(), $this->config->getEndPoint());
        $signedUrl = $ossClient->signUrl($bucket, $objectKey, $timeout);
        return $signedUrl;
    }

    /**
     * 上传文件
     * @param string $objectKey 名称
     * @param string $path 文件路径
     * @param string $callbackUrl 回调地址
     * @param array $callbackVars 回调的时候传的自定义参数
     * @return \by\infrastructure\base\CallResult
     */
    public function putFile($objectKey, $path, $callbackUrl = '', $callbackVars = [])
    {
        try {
            $options = NULL;
            if (!empty($callbackUrl)) {
                $keyValueStr = '';
                $var = [];
                foreach ($callbackVars as $key => $val) {
                    $keyValueStr .= ('&' . $key . '=${x:' . $key . '}');
                    $var['x:' . $key] = $val;
                }

                $url = '{
                    "callbackUrl":"' . $callbackUrl . '",
                    "callbackBody":"bucket=${bucket}&object=${object}&etag=${etag}&size=${size}&mimeType=${mimeType}&imageInfo.height=${imageInfo.height}&imageInfo.width=${imageInfo.width}&imageInfo.format=${imageInfo.format}' . $keyValueStr . '",
                    "callbackBodyType":"application/x-www-form-urlencoded"
                }';
                // 设置发起回调请求的自定义参数，由Key和Value组成，Key必须以x:开始。
                $var = json_encode($var);
                $options = array(
                    OssClient::OSS_CALLBACK => $url,
                    OssClient::OSS_CALLBACK_VAR => $var
                );
            }

            $ossClient = new OssClient($this->config->getAppKey(), $this->config->getAppSecret(), $this->config->getEndPoint());
            $result = $ossClient->uploadFile($this->config->getBucket(), $objectKey, $path, $options);

            if (!empty($callbackUrl)) {
                if (array_key_exists('body', $result)) {
                    $body = json_decode($result['body'], JSON_OBJECT_AS_ARRAY);
                    if (empty($body)) {
                        $body = simplexml_load_string($result['body']);
                        if ($body instanceof \SimpleXMLElement) {
                            $body = json_decode(json_encode($body), JSON_OBJECT_AS_ARRAY);
                            return CallResultHelper::fail($body['Message'], $body);
                        }
                    }
                    return CallResultHelper::success($body['data'], $body['msg'], $body['code']);
                }
            } else {
                return CallResultHelper::success($result, 'complete', 0);
            }
            return CallResultHelper::fail('返回格式错误，缺少body参数');
        } catch (OssException $e) {
            return CallResultHelper::fail($e->getMessage());
        }
    }


    /**
     * 上传对象
     * @param string $objectKey 名称
     * @param string $content 内容
     * @param string $callbackUrl 回调地址
     * @param array $callbackVars 回调的时候传的自定义参数
     * @return \by\infrastructure\base\CallResult
     */
    public function putObject($objectKey, $content, $callbackUrl = '', $callbackVars = [])
    {
        try {
            $options = NULL;
            if (!empty($callbackUrl)) {
                $keyValueStr = '';
                $var = [];
                foreach ($callbackVars as $key => $val) {
                    $keyValueStr .= ('&' . $key . '=${x:' . $key . '}');
                    $var['x:' . $key] = $val;
                }

                $url = '{
                "callbackUrl":"' . $callbackUrl . '",
                "callbackBody":"bucket=${bucket}&object=${object}&etag=${etag}&size=${size}&mimeType=${mimeType}&imageInfo.height=${imageInfo.height}&imageInfo.width=${imageInfo.width}&imageInfo.format=${imageInfo.format}' . $keyValueStr . '",
                "callbackBodyType":"application/x-www-form-urlencoded"
            }';
                // 设置发起回调请求的自定义参数，由Key和Value组成，Key必须以x:开始。
                $var = json_encode($var);
                $options = array(
                    OssClient::OSS_CALLBACK => $url,
                    OssClient::OSS_CALLBACK_VAR => $var
                );
            }
            $ossClient = new OssClient($this->config->getAppKey(), $this->config->getAppSecret(), $this->config->getEndPoint());
            $result = $ossClient->putObject($this->config->getBucket(), $objectKey, $content, $options);
            if (array_key_exists('body', $result)) {
                $body = json_decode($result['body'], JSON_OBJECT_AS_ARRAY);

                return CallResultHelper::success($body['data'], $body['msg'], $body['code']);
            }
            return CallResultHelper::fail('返回格式错误，缺少body参数');
        } catch (OssException $e) {
            return CallResultHelper::fail($e->getMessage());
        }
    }
}