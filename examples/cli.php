<?php

require __DIR__ . '/../src/SmsConnect.php';

$token = '....';

$smsConnect = new \Valerian\Daktela\SmsConnect('http://api.daktela.com/', $token, false);
$smsConnect->sendSms('+420737611889', 'Test Mira', 'COOLCREDIT');

