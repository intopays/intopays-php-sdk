<?php
use SdkIntopays\Pix;


require_once 'vendor/autoload.php';

$jwtToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NiwiZW1haWwiOiJzZGtAaW50b3BheXMuY29tIiwiaWF0IjoxNzEzMTMzMDMwfQ.0uOXAMSq09aasfUkDCzuvaKVUBBAZf0mU1uBz-UDXkQ";
$baseUrl = "https://dev-app.intopays.com";

$pix = new Pix($baseUrl, $jwtToken);

$data = [
  "calendarExpiration" => 86400,
  "debtorName" => "Raphael",
  "debtorDocument" => "XXX.XXX.XXX-XX",
  "amountOriginal" => "10.99",
  "amountModificationType" => 0,
  "payerRequest" => "Esse texto esta limitado a 140 caracteres.",
  "additionalInfos" => [
    [
      "name" => "Campo 1",
      "value" => "Informacao Adicional do PSP-Recebedor"
    ]
  ],
  "integrationType" => "SICOOB"
];

$pix = new Pix($baseUrl, $jwtToken);

$response = $pix->createPixTransaction($data);

echo json_encode($response);
