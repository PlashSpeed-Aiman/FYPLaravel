<?php

namespace App\Services;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Request;
use App\Models\Client as ClientModel;

class PaymentService
{
    private HttpClient $client;
    private string $authToken;
    //make http request using guzzle

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        //initialize guzzle client
        $this->client = new HttpClient();
        $options = [
            'multipart' => [
                [
                    'name' => 'apiKey',
                    'contents' => env('PAYMENT_API_KEY')
                ]
            ]];
        $request = new Request('POST', 'https://bizappay.my/api/v3/token');
        $res = $this->client->sendAsync($request, $options)->wait();
        if ($res->getStatusCode() != 200) {
            throw new \Exception('Failed to get auth token');
        }
        $this->authToken = json_decode($res->getBody())->token;
    }

    public function makePayment($invoiceId, $amount, ClientModel $client)
    {
        $headers=[
            'Authentication' => $this->authToken
        ];
        $options = [
            'multipart' => [
                [
                    'name' => 'apiKey',
                    'contents' => env('PAYMENT_API_KEY')
                ],
                [
                    'name' => 'category',
                    'contents' => env('PAYMENT_CATEGORY_CODE')
                ],
                [
                    'name' => 'name',
                    'contents' => $invoiceId
                ],
                [
                    'name' => 'amount',
                    'contents' => number_format((float)$amount, 2, '.', '')
                ],
                [
                    'name' => 'payer_name',
                    'contents' => $client->name
                ],
                [
                    'name' => 'payer_email',
                    'contents' => $client->email
                ],
                [
                    'name' => 'payer_phone',
                    'contents' => $client->phone
                ],


            ]];
        $request = new Request('POST', 'https://bizappay.my/api/v3/bill/create', $headers);
        $res = $this->client->sendAsync($request, $options)->wait();
        if ($res->getStatusCode() != 200) {
            throw new \Exception('Failed to make payment');
        }
        return json_decode($res->getBody()->getContents())->url;
    }

}
