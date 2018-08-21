<?php

namespace App\Billing;

class Stripe
{
    private $secret_key;
    public function __construct($secret_key)
    {
        $this->secret_key = $secret_key;
    }
}