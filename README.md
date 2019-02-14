# component_oss
第三方对象存储服务接口统一

1. 七牛云

2. 阿里云OSS

```
$cfg = new AliyunOssConfig();
...设置 key 密钥，endpoint，bucket名称

$uploader = new AliyunOss(new DemoConfig());

//如果指定了，$result 返回是同步请求该地址的结果
$callbackUrl = "";
$params = [];// 携带参数

$localpath = dirname(__DIR__)."/qiniu/demo.png";
$saveName = "/path/1.jpg";
$result = $uploader->putFile($saveName, $localpath, $cb, $params);
var_dump($result);
```

# 1.0.3

1. 使用dbh/core 依赖
2. 完善阿里云上传
