<?php

require __DIR__ . '/../src/SMSConnect.php';

$token = 'f632fcf5dbf0b375a267db699195a02c24644789';

$smsConnect = new \Valerian\Daktela\SmsConnect(null, $token, true);
$smsConnect->sendSms('+420xxxxxxxxx', 'Test Mira', 'Test');

