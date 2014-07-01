<?php

namespace Payum\BitPay\Request\ApiRest\Objects;

class Buyer
{

    protected $_email = '';
    protected $_name = '';
    protected $_address = '';
    protected $_city = '';
    protected $_state = '';
    protected $_zip = '';
    protected $_country = '';


    //setters    

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function setAddress($address)
    {
        $this->_address = $address;
    }

    public function setCity($city)
    {
        $this->_city = $city;
    }

    public function setState($state)
    {
        $this->_state = $state;
    }

    public function setZip($zip)
    {
        $this->_zip = $zip;
    }

    public function setCountry($country)
    {
        $this->_country = $country;
    }


    //getters

    public function getEmail()
    {
        return $this->_email;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getAddress()
    {
        return $this->_address;
    }

    public function getCity()
    {
        return $this->_city;
    }

    public function getState()
    {
        return $this->_state;
    }

    public function getZip()
    {
        return $this->_zip;
    }

    public function getCountry()
    {
        return $this->_country;
    }


}
