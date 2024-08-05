<?php

namespace App\Services;

use Kkiapay\Kkiapay;

class KkiapayService
{
    protected $kkiapay;

    public function __construct()
    {
        $this->kkiapay = new Kkiapay(
            config('kkiapay.public_key'),
            config('kkiapay.private_key'),
            config('kkiapay.secret'),
            config('kkiapay.sandbox')
        );
    }

    public function verifyTransaction($transaction_id)
    {
        return $this->kkiapay->verifyTransaction($transaction_id);
    }
}
