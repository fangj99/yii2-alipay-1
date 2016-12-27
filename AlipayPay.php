<?php
namespace ysj\yii2\alipay;

use ysj\yii2\alipay\lib\AlipayNotify;
use Yii;
use ysj\yii2\alipay\lib\AlipaySubmit;
use ysj\yii2\alipay\lib\AlipayCorel;

class AlipayPay
{

    /**
     * @param $out_trade_no 商户订单号，商户网站订单系统中唯一订单号，必填
     * @param $subject  订单名称，必填
     * @param $total_fee    付款金额，必填
     * @param $body 商品描述，可空
     */
    function requestpay($out_trade_no, $subject, $total_fee, $body)
    {
        /************************************************************/

        //构造要请求的参数数组，无需改动
        $parameter = array(
            "service" => Yii::$app->params['AlipayConfig']['service'],
            "partner" => Yii::$app->params['AlipayConfig']['partner'],
            "seller_id" => Yii::$app->params['AlipayConfig']['seller_id'],
            "payment_type" => Yii::$app->params['AlipayConfig']['payment_type'],
            "notify_url" => Yii::$app->params['AlipayConfig']['notify_url'],
            "return_url" => Yii::$app->params['AlipayConfig']['return_url'],

            "anti_phishing_key" => Yii::$app->params['AlipayConfig']['anti_phishing_key'],
            "exter_invoke_ip" => Yii::$app->params['AlipayConfig']['exter_invoke_ip'],
            "out_trade_no" => $out_trade_no,
            "subject" => $subject,
            "total_fee" => $total_fee,
            "body" => $body,
            "_input_charset" => trim(strtolower(Yii::$app->params['AlipayConfig']['input_charset']))
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
            //如"参数名"=>"参数值"
        );
        //建立请求
        $alipaySubmit = new AlipaySubmit(Yii::$app->params['AlipayConfig']);
        $html_text = $alipaySubmit->buildRequestForm($parameter, "get", "确认");
        echo $html_text;
    }

    function verifyReturn()
    {
        $alipayNotify = new AlipayNotify(Yii::$app->params['AlipayConfig']);
        $verify_result = $alipayNotify->verifyReturn();
        return $verify_result;
    }


}