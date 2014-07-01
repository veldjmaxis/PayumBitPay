<?php
namespace Payum\BitPay;

use Payum\Core\Action\ExecuteSameRequestWithModelDetailsAction;
use Payum\Core\Extension\EndlessCycleDetectorExtension;
use Payum\Core\Payment;
use Payum\BitPay\Action\PaymentWithBitPayCaptureAction;
use Payum\BitPay\Action\PaymentWithBitPayStatusAction;

abstract class PaymentFactory
{

    public static function create( Api $api)
    {


        $payment = new Payment;

        $payment->addApi($api);

        $payment->addExtension(new EndlessCycleDetectorExtension);

        if($api instanceof DoPaymentWithBitPayApi)
            $payment->addAction(new PaymentWithBitPayCaptureAction());

        $payment->addAction(new ExecuteSameRequestWithModelDetailsAction);

        return $payment;
    }

}