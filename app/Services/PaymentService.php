<?php

namespace App\Services;

use GuzzleHttp\Client;

class PaymentService
{
    //make http request using guzzle
    public function makePayment($invoiceId, $amount)
    {
        //make http request to payment gateway
        $client = new Client();
        //return response
    }

}
