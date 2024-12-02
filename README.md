# SDK [intopays](https://intopays.com/)

## Installing via composer

```
composer require raphaelvserafim/sdk-intopays
```


##### Boleto
```php
use SdkIntopays\Boleto;
use SdkIntopays\Pix;

include_once 'vendor/autoload.php';

$jwtToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NiwiZW1haWwiOiJzZGtAaW50b3BheXMuY29tIiwiaWF0IjoxNzEzMTMzMDMwfQ.0uOXAMSq09aasfUkDCzuvaKVUBBAZf0mU1uBz-UDXkQ";

$baseUrl = "https://dev-app.intopays.com";

$boleto = new Boleto($baseUrl, $jwtToken);


```

#### Listar todos os Boletos 
```php

    $boletos = $boleto->getAllBoletos();
    echo json_encode($boletos);

```


#### Gerar um novo Boleto
```php

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


```

##### Pix

```php
$pix = new Pix($baseUrl, $jwtToken);

```

#### Gerar novo Pix
```php
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

$response = $pix->createPixTransaction($data);

echo json_encode($response);

```
