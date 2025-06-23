<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Modules\BasicPayment\app\Models\BasicPayment;
use Modules\PaymentGateway\app\Models\PaymentGateway;

trait PaymentInformationTrait
{
    private function put_payment_cache()
    {
        $payment_info = PaymentGateway::get();
        $payment_setting = [];
        foreach ($payment_info as $payment_item) {
            $payment_setting[$payment_item->key] = $payment_item->value;
        }

        $payment_setting = (object) $payment_setting;
        Cache::put('payment_setting', $payment_setting);
    }

    public function put_basic_payment_cache()
    {
        $payment_setting = [];
        $payment_info = BasicPayment::get();

        foreach ($payment_info as $payment_item) {
            $payment_setting[$payment_item->key] = $payment_item->value;
        }
        $payment_setting = (object) $payment_setting;
        Cache::put('basic_payment', $payment_setting);
    }
}
