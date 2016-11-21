<?php
declare(strict_types = 1);

namespace Bot\App;

class GetMessage
{
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getUpdates()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
                CURLOPT_URL => $this->url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false
            ]
        );

        $json = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new \Exception('Error: ' . curl_error($curl));;
        }

        curl_close($curl);

        return json_decode($json);
    }
}
