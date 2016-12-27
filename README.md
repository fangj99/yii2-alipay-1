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