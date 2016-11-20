<?php
declare(strict_types = 1);

namespace Bot\App;

class Update
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getUpdates()
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

        $json = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new \Exception('Error: ' . curl_error($curl));;
        }

        curl_close($curl);
        
        return json_decode($json);
    }
}
