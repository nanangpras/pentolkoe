<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

/**
 * Format response.
 */
class SendWa
{
    /**
     * API Response
     *
     * @var array
     */

    static function sendNotifAdmin($invoice, $total_bayar, $status_bayar)
    {
        // $host = route('klaim.show', $token);
        $pesan = "Ada order masuk dengan nomer invoice $invoice dengan total $total_bayar status bayar $status_bayar. Mohon segera di proses. Terimakasih";
        // $host";
        SendWa::curlWa($pesan);
    }

    static function curlWa($pesan)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => '081325119991',
        'message' => $pesan,
        // 'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: uvhXXdC3a75u8QydycHT' //change TOKEN to your actual token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://fonnte.com/api/send_message.php",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "POST",
        //     CURLOPT_POSTFIELDS => array('phone' => $nohp, 'type' => 'text', 'text' => $pesan, 'delay' => '1', 'delay_req' => '1', 'schedule' => '0'),
        //     CURLOPT_HTTPHEADER => array(
        //         "Authorization: MDS96WxhAucPws7ADsxN"
        //     ),
        // ));

        // curl_exec($curl);
        // // dd($response);
        // curl_close($curl);
    }
}
