
<?php

$curl = curl_init();
$data = array( "api_key" => "TLDakjXDRqjZyemaGqlNanMrfJXhLUrhvyABhiHfJNgdfcDCuFfUFuTaedUXax",
             "message_type" => "NUMERIC",
             "to" => "+254727405667",
             "from" => "Approved Sender ID or Configuration ID",
             "channel" => "dnd",
             "pin_attempts" => 10,
             "pin_time_to_live" =>  5,
             "pin_length" => 6,
             "pin_placeholder" => "< 1234 >",
             "message_text" => "Your pin is < 1234 >",
             "pin_type" => "NUMERIC");

$post_data = json_encode($data);

curl_setopt_array($curl, array(
 CURLOPT_URL => "https://v3.api.termii.com/sms/otp/send",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 0,
 CURLOPT_FOLLOWLOCATION => true,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => $post_data,
 CURLOPT_HTTPHEADER => array(
   "Content-Type: application/json"
 ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


?>