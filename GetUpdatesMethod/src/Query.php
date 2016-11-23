<?php
declare(strict_types = 1);

namespace Bot\App;

class Query
{
    private static $url;

    public static function getMethod(string $token, string $path, string $query)
    {
        self::$url = 'https://api.telegram.org/bot' . $token . $path . $query;

        $curl = curl_init();

        curl_setopt_array($curl, [
                CURLOPT_URL => self::$url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30
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
