<?php

namespace Rate\Rate;

use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Rate
{
    /**
     *
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function generateCurrency(string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://wu.crpt.trading/rate/generate-currency', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ]
        ]);
        return $response->toArray();
    }

    /**
     *
     * @param string $type
     * @param array $data
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function getCryptocurrencyHistory(string $type, array $data, string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'https://rate.crpt.trading/rate/cryptocurrency-history', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'type' => $type,
                'data' => $data
            ]
        ]);
        return $response->toArray();
    }
}