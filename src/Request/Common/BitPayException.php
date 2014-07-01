<?php

namespace Payum\BitPay\Request\Common;

class BitPayException extends \Exception
{

    public function __construct($string, $code)
    {

        parent::__construct($string, (int) $code);
    }

    public function __toString()
    {
        return sprintf("(%s) %s", $this->code, $this->message);
    }

}
