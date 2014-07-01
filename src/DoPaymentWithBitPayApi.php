<?php

namespace Payum\BitPay;

use Payum\BitPay\Api;
use Payum\BitPay\Request\ApiRest\Invoice;
use Payum\BitPay\Request\ApiRest\Objects\Buyer;
use Payum\BitPay\Request\ApiRest\Objects\Settings;
use Payum\BitPay\Request\ApiRest\Objects\Response;

class DoPaymentWithBitPayApi extends Api
{

    protected $_apiKey;

    public function __construct($config)
    {
        $this->_apiKey  = $config['apiKey'];
    }

    public function getApiKey()
    {
        return $this->_apiKey;
    }

    public function doPaymentWithBitPay(
        Buyer $buyer,
        Settings $settings
    ) {

       $invoice = new Invoice($buyer, $settings);
       $invoice->createInvoice();
       $response = $invoice->getResponse();

        if($response instanceof Response){

            \Yii::app()->request->redirect($response->getUrl());
        }

    }

}