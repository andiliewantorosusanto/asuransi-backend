<?php

namespace App\Services;

use DateTime;
use stdClass;

class VirtualAccountService
{
    public function __construct()
    {

    }

    public function registerVA($namaPemohon,$nominal,$tanggalExpired)
    {
        $success = false;
        $number = 10;
        $data = new stdClass;

        do{
            $todayDate = new DateTime();
            $orderId = $todayDate->format('ymd') . '20' . $number;


            $credentials = base64_encode('bcafapps:Admin123');

            $headers = [
                'Authorization' => 'Basic '.$credentials,
                'Content-Type' => 'application/json'
            ];

            $body = [
                'kodeAplikasi' => '020',
                'kodeTransaksi' => '001',
                'orderId' => $orderId,
                'namaPemohon' => $namaPemohon,
                'nominalTagihan' => $nominal,
                'tanggalExpired' => $tanggalExpired,
                'Source' => 'Asuransi'
            ];

            $client = new \GuzzleHttp\Client();

            $request = $client->post('http://192.168.29.71:12103/VirtualAccount/CreateVANonKonsumenRestPS/virtualAccount/CreateVANonKonsumen',
                [
                    'headers' => $headers,
                    'json'  => $body
                ]
            );

            $data = json_decode($request->getBody()->getContents());

            if($data->errorCode == "00") {
                $success = true;
            }
            $number++;
        }while(!$success);

        return $data;
    }

    public function checkPembayaranVA($noVA)
    {
        $credentials = base64_encode('bcafapps:Admin123');
        $client = new \GuzzleHttp\Client([
            'headers' => ['Authorization' => 'Basic '.$credentials]
        ]);
        $request = $client->request('POST', 'http://192.168.29.71:12103/VirtualAccount/GetStatusPembayaranRestPS/virtualAccount/getStatusPembayaran', [
            'noVA' => $noVA
        ]);
        $data = json_decode($request->getBody()->getContents());

        return $data;
    }
}
