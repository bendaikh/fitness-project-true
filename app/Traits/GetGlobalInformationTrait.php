<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Modules\BasicPayment\app\Models\BasicPayment;
use Modules\BasicPayment\app\Services\PaymentMethodService;
use Modules\Currency\app\Models\MultiCurrency;
use Modules\BasicPayment\app\Models\PaymentGateway;

trait GetGlobalInformationTrait
{
    // get basic payment gateway information
    /**
     * @return mixed
     */
    public function getBasicPaymentInfo()
    {
        $basic_payment = Cache::rememberForever('basic_payment', function () {

            $payment_info = BasicPayment::get();

            $basic_payment = [];
            foreach ($payment_info as $payment_item) {
                $basic_payment[$payment_item->key] = $payment_item->value;
            }

            return (object) $basic_payment;
        });

        return $basic_payment;
    }

    // get addon payment gateway information
    /**
     * @return mixed
     */
    public function getPaymentGatewayInfo()
    {
        $payment_setting = Cache::rememberForever('payment_setting', function () {

            $payment_info = PaymentGateway::get();

            $payment_setting = [];
            foreach ($payment_info as $payment_item) {
                $payment_setting[$payment_item->key] = $payment_item->value;
            }

            return (object) $payment_setting;
        });

        return $payment_setting;
    }

    private function getMultiCurrencyInfo($currency_code = null)
    {
        if (is_null($currency_code)) {
            $currency_code = getSessionCurrency();
        }
        $gateway_currency = allCurrencies()->where('currency_code', $currency_code)->first();

        return [
            'currency_code' => $gateway_currency->currency_code,
            'country_code'  => $gateway_currency->country_code,
            'currency_rate' => $gateway_currency->currency_rate,
            'currency_id'   => $gateway_currency->id,
        ];
    }

    /**
     * @param $currencyId
     */
    private function getCurrencyDetails($currencyId)
    {
        $gateway_currency = MultiCurrency::where('id', $currencyId)->first();

        return [
            'currency_code' => $gateway_currency?->currency_code,
            'country_code'  => $gateway_currency?->country_code,
            'currency_rate' => $gateway_currency?->currency_rate,
        ];
    }

    /**
     * @param $payable_amount
     * @param $gateway_name
     */
    public function calculatePayableCharge($payable_amount, $gateway_name, $currency_code = null)
    {
        $paymentService = app(PaymentMethodService::class);

        $paymentDetails = $paymentService->getGatewayDetails($gateway_name);

        $gateway_charge = $paymentDetails->charge;

        $multiCurrencyInfo = $this->getMultiCurrencyInfo($currency_code);
        $currency_code = $multiCurrencyInfo['currency_code'];
        $country_code = $multiCurrencyInfo['country_code'];
        $currency_rate = $multiCurrencyInfo['currency_rate'];
        $currency_id = $multiCurrencyInfo['currency_id'];

        $payable_amount = $payable_amount * $currency_rate;
        $gateway_charge = $payable_amount * ($gateway_charge / 100);

        $payable_with_charge = $payable_amount + $gateway_charge;
        $payable_with_charge = sprintf('%0.2f', $payable_with_charge);

        session()->put('payable_with_charge', $payable_with_charge);
        session()->put('gateway_charge', $gateway_charge);
        session()->put('payable_currency', $currency_code);

        return (object) [
            'country_code'               => $country_code,
            'currency_code'              => $currency_code,
            'currency_id'                => $currency_id ?? 1,
            'payable_amount'             => $payable_amount,
            'gateway_charge'             => $gateway_charge,
            'payable_with_charge'        => $payable_with_charge,
        ];
    }
}
