<?php

namespace Payum\BitPay\Request\ApiRest\Objects;

class Response
{

    protected $_id = '';
    protected $_url = '';
    protected $_posData = '';
    protected $_status = '';
    protected $_price = '';
    protected $_currency = '';
    protected $_btcPrice = '';
    protected $_invoiceTime = '';
    protected $_expirationTime = '';
    protected $_currentTime = '';


    public function __construct(Array $response)
    {

        $this->_id             = $response['id'];
        $this->_url            = $response['url'];
        $this->_posData        = json_decode($response['posData']);
        $this->_status         = $response['status'];
        $this->_price          = $response['price'];
        $this->_currency       = $response['currency'];
        $this->_btcPrice       = $response['btcPrice'];
        $this->_invoiceTime    = $response['invoiceTime'];
        $this->_expirationTime = $response['expirationTime'];
        $this->_currentTime    = $response['currentTime'];

    }


    //getters

    public function getId()
    {
        return $this->_id;
    }

    public function getUrl()
    {
        return $this->_url;
    }

    public function getPosData()
    {
        return $this->_posData;
    }

    public function getStatus()
    {
        return $this->_status;
    }

    public function getPrice()
    {
        return $this->_price;
    }

    public function getCurrency()
    {
        return $this->_currency;
    }

    public function getBtcPrice()
    {
        return $this->_btcPrice;
    }

    public function getInvoiceTime()
    {
        return $this->_invoiceTime;
    }

    public function getExpirationTime()
    {
        return $this->_expirationTime;
    }

    public function getCurrentTime()
    {
        return $this->_currentTime;
    }

}