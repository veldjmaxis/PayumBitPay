<?php

namespace Payum\BitPay\Request\ApiRest;

use Payum\BitPay\Api;
use Payum\BitPay\DoPaymentWithBitPayApi;
use Payum\BitPay\Request\ApiRest\Objects\Buyer;
use Payum\BitPay\Request\ApiRest\Objects\Settings;
use Payum\BitPay\Request\ApiRest\Objects\Response;
use Payum\BitPay\Request\Common\BitPayException;

require_once('Libraries/bp_lib.php');

class Invoice
{

    protected $_buyer;
    protected $_settings;
    protected $_response;

    public function __construct(
        Buyer $buyer,
        Settings $settings
    ) {
        $this->_buyer    = $buyer;
        $this->_settings = $settings;
    }


    public function createInvoice()
    {

        $posData = array($this->_settings->getAmount(), $this->_settings->getId());

        $options = array(
            'buyerEmail'        => $this->_buyer->getEmail(),
            'buyerName'         => $this->_buyer->getName(),
            'buyerAddress'      => $this->_buyer->getAddress(),
            'buyerCity'         => $this->_buyer->getCity(),
            'buyerState'        => $this->_buyer->getState(),
            'buyerZip'          => $this->_buyer->getZip(),
            'buyerCountry'      => $this->_buyer->getCountry(),
            'apiKey'            => $this->_settings->getApiKey(),
            'notificationURL'   => $this->_settings->getNotificationUrl(),
            'transactionSpeed'  => $this->_settings->getTransactionSpeed(),
            'fullNotifications' => $this->_settings->getFullNotifications(),
            'itemDesc'          => $this->_settings->getItemDesc(),
            'currency'          => $this->_settings->getCurrency(),
            'redirectURL'       => $this->_settings->getRedirectUrl(),
        );

        $invoice = bpCreateInvoice(null, $this->_settings->getAmount(), $posData, $options);

        if (isset($invoice['error'])) {

           throw new BitPayException($invoice['error']['message'],$invoice['error']['type']);

        } else {

            $this->_response = new Response($invoice);
        }

    }

    public function getResponse()
    {
        return $this->_response;
    }

}
