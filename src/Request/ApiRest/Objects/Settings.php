<?php

namespace Payum\BitPay\Request\ApiRest\Objects;

class Settings
{

    protected $_apiKey = '';
    protected $_notificationUrl = '';
    protected $_transactionSpeed = 'high';
    protected $_fullNotifications = true;
    protected $_id = '';
    protected $_amount = 0;
    protected $_itemDesc = '';
    protected $_currency = 'USD';
    protected $_redirectUrl = '';


    //setters
    public function setApiKey($key)
    {
        $this->_apiKey = $key;

    }

    public function setId($id)
    {
        $this->_id = $id;

    }

    public function setCurrency($currency)
    {
        $this->_currency = $currency;

    }

    public function setItemDesc($string)
    {
        $this->_itemDesc = $string;
    }

    public function setNotificationUrl($url)
    {
        $this->_notificationUrl = $url;

    }

    public function setRedirectUrl($url)
    {
        $this->_redirectUrl = $url;

    }

    public function addItems(Array $items)
    {

        foreach ($items as $item) {

            $this->_amount += $item['Amount'];
        }

    }


    //getters

    public function getApiKey()
    {
        return $this->_apiKey;

    }

    public function getId()
    {
        return $this->_id;

    }

    public function getCurrency()
    {
        return $this->_currency;

    }

    public function getAmount()
    {
        return $this->_amount;

    }

    public function getNotificationUrl()
    {
        return $this->_notificationUrl;

    }

    public function getRedirectUrl()
    {
        return $this->_redirectUrl;

    }

    public function getTransactionSpeed()
    {
        return $this->_transactionSpeed;

    }

    public function getFullNotifications()
    {
        return $this->_fullNotifications;

    }

    public function getItemDesc()
    {
        return $this->_itemDesc;

    }

}