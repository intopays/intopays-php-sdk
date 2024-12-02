<?php

use SdkIntopays\Boleto;

require_once 'vendor/autoload.php';

$jwtToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NiwiZW1haWwiOiJzZGtAaW50b3BheXMuY29tIiwiaWF0IjoxNzEzMTMzMDMwfQ.0uOXAMSq09aasfUkDCzuvaKVUBBAZf0mU1uBz-UDXkQ";
$baseUrl = "https://dev-app.intopays.com";


$boleto = new Boleto($baseUrl, $jwtToken);


$boletos = $boleto->getAllBoletos();


echo json_encode($boletos);

$data = [
  "amount" => 2.51,
  "dueDate" => "2024-02-14T07:20:06.153Z",
  "daysAfterDueDateForCancellation" => 30,
  "payerDocument" => "000.000.000-00",
  "payerName" => "Luffrs",
  "payerEmail" => "email@intoapys.com",
  "payerPhone" => "51999999999",
  "payerZipCode" => "91760110",
  "payerNumber" => "123",
  "payerComplement" => "Apto 123",
  "payerNeighborhood" => "Centro",
  "payerCity" => "Salto",
  "payerState" => "AC",
  "payerAddress" => "Rua Principal",
  "messageLine1" => "Message line 1",
  "messageLine2" => "Message line 2",
  "discount1Code" => "NO_DISCOUNT",
  "discount1Rate" => 0,
  "discount1Value" => 0,
  "discount1Date" => null,
  "discount2Code" => "NO_DISCOUNT",
  "discount2Rate" => 0,
  "discount2Value" => 10,
  "discount2Date" => "2024-02-10T00:00:00.000Z",
  "fineCode" => "NO_FINE",
  "fineDate" => null,
  "fineValue" => 0,
  "fineRate" => 0,
  "interestCode" => "EXEMPT",
  "interestDate" => null,
  "interestRate" => 0,
  "interestValue" => 0,
  "finalBeneficiaryName" => "Final Beneficiary",
  "finalBeneficiaryDocument" => "111.111.111-11",
  "finalBeneficiaryZipCode" => "98765432",
  "finalBeneficiaryAddress" => "Rua Final",
  "finalBeneficiaryNeighborhood" => "Bairro Final",
  "finalBeneficiaryCity" => "Final City",
  "finalBeneficiaryState" => "SP",
  "integrationType" => "SICOOB"
];


$response = $boleto->createBoletoTransaction($data);

echo json_encode($response);