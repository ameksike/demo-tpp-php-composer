<?php

// loading library
require_once __DIR__.'/vendor/autoload.php';
use TppSdk\TropiPay as TropiPay;

// define credentials
$clientId = "5aca1638f7596bee9cb388e51d2ad58e";
$clientSecret = "4a0150d3cec2036b9f24ec53f52e7c19";

// define the environment to use (production, development, test, etc.)
$enviroment = "develop";

// instantiate the library
$srv = new TropiPay($clientId, $clientSecret, $enviroment);

// define the data of the payment link to create
$payload = array(
    "reference"=> "my-paylink-1",
    "concept"=> "Bicycle",
    "favorite"=> "true",
    "amount"=> 3000,
    "currency"=>"EUR",
    "description" => "Two wheels",
    "singleUse"=>"true",
    "reasonId"=>4,
    "expirationDays"=>1,
    "lang"=>"es",
    "urlSuccess"=>"https://webhook.site/680826a5-199e-4455-babc-f47b7f26ee7e",
    "urlFailed"=>"https://webhook.site/680826a5-199e-4455-babc-f47b7f26ee7e",
    "urlNotification"=>"https://webhook.site/680826a5-199e-4455-babc-f47b7f26ee7e",
    "serviceDate"=>"2021-08-20",
    "client"=> array(
        "name"=>"John",
        "lastName"=>"McClane",
        "address"=>"Ave. Guadí 232, Barcelona, Barcelona",
        "phone"=>"+34645553333",
        "email"=>"client@email.com",
        "countryId"=>1,
        "termsAndConditions"=>"true"
    ),
    "directPayment"=>"true"
);

// create payment link
$paylink = $srv->createPaylink($payload);

// show the data
print_r($paylink);

/*
(
    [error] =>
    [data] => Array
        (
            [id] => b373e470-7a4d-11ec-b779-4b774651889c
            [reference] => my-paylink-1
            [concept] => Bicycle
            [description] => Two wheels
            [amount] => 3000
            [currency] => EUR
            [singleUse] => 1
            [favorite] => 1
            [reasonId] => 4
            [reasonDes] =>
            [expirationDays] => 0
            [userId] => e2931920-e402-11ea-a30d-83c978a74aaa
            [lang] => es
            [state] => 1
            [urlSuccess] => https://webhook.site/680826a5-199e-4455-babc-f47b7f26ee7e
            [urlFailed] => https://webhook.site/680826a5-199e-4455-babc-f47b7f26ee7e
            [urlNotification] => https://webhook.site/680826a5-199e-4455-babc-f47b7f26ee7e
            [expirationDate] =>
            [serviceDate] =>
            [hasClient] => 1
            [updatedAt] => 2022-01-21T00:04:28.990Z
            [createdAt] => 2022-01-21T00:04:28.346Z
            [qrImage] => data:image/png;base64,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
            [shortUrl] => https://tppay.me/kynn50t3
            [paymentUrl] =>
        )

)
*/