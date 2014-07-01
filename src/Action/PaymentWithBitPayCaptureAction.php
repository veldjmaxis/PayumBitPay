<?php
/*
 * See the documentation about this in:
 * http://payum.forma-dev.com/documentation/master/Payum/develop-payment-gateway-with-payum
 *
 * */
namespace Payum\BitPay\Action;


use Payum\Core\Action\PaymentAwareAction;
use Payum\YiiExtension\Model\PaymentDetailsActiveRecordWrapper;
use Payum\BitPay\Request\Common\BitPayException;
use Payum\BitPay\Request\ApiRest\Objects\Buyer;
use Payum\BitPay\Request\ApiRest\Objects\Settings;

class PaymentWithBitPayCaptureAction extends PaymentAwareAction
{

    public function execute($request)
    {

        $getPayumPaymentDetails = PaymentDetailsActiveRecordWrapper::findModelById(
            'payum_payment',
            $request->getModel()->getDetails()->getId()
        );

        $model = unserialize($getPayumPaymentDetails->activeRecord->attributes['_details']);

        $buyer = new Buyer();
        $buyer->setName($model['Name'] . ' ' . $model['LastName']);
        $buyer->setEmail($model['Email']);

        $getPayment          = \Payment::model()->findByPk($model['PaymentId']);
        $getBitPayConfig = \BitPayConfig::model()->findByPk($getPayment->payment_method_id);

        $api = $getBitPayConfig->getApi();

        $settings = new Settings();
        $settings->setApiKey($api->getApiKey());
        $settings->setCurrency($model['CurrencyCode']);
        $settings->setId($model['MerchantTransactionId']);
        $settings->addItems($model['Items']);
        $settings->setItemDesc($model['PaymentDescription']);
        $settings->setRedirectUrl($request->getModel()->activeRecord->_after_url);

        try {

            $api->doPaymentWithBitPay(
                $buyer,
                $settings
            );

        } catch (BitPayException $e) {

            \Yii::app()->request->redirect(
                $request->getModel()->activeRecord->_after_url . '&error=true&message='. $e->getMessage()
            );
        }

    }

    public function supports($request)
    {
        $getPayumPaymentDetails = PaymentDetailsActiveRecordWrapper::findModelById(
            'payum_payment',
            $request->getModel()->getDetails()->getId()
        );

        $model = unserialize($getPayumPaymentDetails->activeRecord->attributes['_details']);

        if ($model['PaymentMethod'] == \PaymentMethodConfig::BITPAY) {

            return true;

        } else {

            return false;
        }

    }
}