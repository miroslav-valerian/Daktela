<?php

namespace Valerian\Daktela;

/**
 * Daktela SMSConnect API
 */
class SmsConnect
{

    const TEST_URL = 'https://api.daktela.com';

    /**
     * @var string
     */
    protected $server;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var bool
     */
    protected $debug;

    /**
     * SmsConnect constructor.
     * @param string $server
     * @param string $token
     * @param bool $debug
     */
    public function __construct($server = null, $token, $debug = false)
    {
        $this->server = $server;
        $this->token = $token;
        $this->debug = $debug;
    }

    /**
     * @param string $number
     * @param string $message
     * @param string $sender
     * @return bool
     * @throws \Exception
     */
    public function sendSms($number, $message, $sender = null)
    {
        $url = $this->getUrl().'number='.urlencode($number).'&message='.urlencode($message).'&access_token='.$this->token;
        if ($sender) {
            $url = $url.'&sender='.$sender;
        }
        $request = curl_init();
        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($request);
        $curlInfo = curl_getinfo($request);
        curl_close($request);

        if ($curlInfo['http_code'] == 200) {
            $responseDecode = json_decode($response);
            if ($responseDecode->status == 1) {
                return true;
            } else {
                throw new \Exception($response);
            }
        } else {
            throw new \Exception('Error while sending request.');
        }
    }

    /**
     * @return string
     */
    private function getUrl()
    {
        if ($this->debug) {
            $url = self::TEST_URL;
        } else {
            $url = $this->server;
        }
        return $url.'/api/4.1/SendSMSConnect/json?';
    }
}
