<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => 'https://app.sandbox.midtrans.com/snap/v1/transactions',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
  "transaction_details": {
    "order_id": "ORDER-101-1663289607",
    "gross_amount": 1000
  }, 
  "credit_card": {
    "secure": true
  }
}',
    CURLOPT_HTTPHEADER => ['Accept: application/json', 'Content-Type: application/json', 'Authorization: Basic U0ItTWlkLXNlcnZlci1CekxnWWhpcy05RkxSZUtzUk5xR3pLbnY6'],
]);

$response = curl_exec($curl);
// $res = curl_setopt($response, CURLOPT_RETURNTRANSFER, 1)->redirect_url;
$res = json_decode($response)->redirect_url;

curl_close($curl);
echo $res;

$page = file_get_contents($res);

// echo $page;
// header('location:somewhere.php');

echo '<a href='.$res.'></a>';

?>
