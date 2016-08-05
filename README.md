Daktela API
=====
Daktela API for sending SMS via SMSConnect

Example
=======

$smsConnect = new SmsConnect('https://api.daktela.com', $token);
var_dump($smsConnect->sendSms('+420xxxxxxxxx', 'Message', 'Sender'));
