# Yii2支付宝插件

#注意 ：
1、因不会使用packagist，所以下面的均为手动
2、YII2必须开启urlmanager，否则有r=这样的路径会出问题

#修改步骤
1、修改文件vendor/composer/autoload_psr4.php
在数组增加成员变量
```php
'ysj\\yii2\\alipay\\' => array($vendorDir . '/ysj/yii2-alipay'),
```
2、修改文件vendor/composer/autoload_static.php
在数组$prefixDirsPsr4中增加成员变量
```php
 'ysj\\yii2\\alipay\\' =>
            array (
                0 => __DIR__ . '/..' . '/ysj/yii2-alipay',
            ),
```
在数组$prefixLengthsPsr4中的y数组增加成员变量
```php
'ysj\\yii2\\alipay'=>61,
```
3、修改文件vendor/yiisoft/extensions.php
在数组中增加成员变量
````php
    'ysj/yii2-alipay' =>
        array (
            'name' => 'ysj/yii2-alipay',
            'version' => '1.0.0.0',
            'alias' =>
                array (
                    '@ysj/yii2/alipay' => $vendorDir . '/ysj/yii2-alipay',
                ),
        ),
```
4、把下载的文件夹解压到vendor/yiisoft/ysj下，路径自己补齐，入口文件路径为：
vendor/yiisoft/ysj/yii2-alipay/AlipayPay.php

#使用说明
去PAY(参数修改为自己的)
```php

    /**
     * @param $out_trade_no 商户订单号，商户网站订单系统中唯一订单号，必填
     * @param $subject  订单名称，必填
     * @param $total_fee    付款金额，必填
     * @param $body 商品描述，可空
     */
	$pay = new AlipayPay();
            return $pay->requestPay("0-" . time(), "test--0" . time() . Yii::$app->user->getId(), "0.01", "YII2测试alipay");
```
同步验证
```php
$pay = new AlipayPay();
        var_dump($pay->verifyReturn());
```
异步验证
```php
$pay = new AlipayPay();
        var_dump($pay->verifyNotify());
```
