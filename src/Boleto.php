<?php

namespace SdkIntopays;

use GuzzleHttp\Exception\RequestException;
use SdkIntopays\HttpClient;

class Boleto extends HttpClient
{
  public function createBoletoTransaction(array $data): array
  {
    try {
      $response = $this->client->post('/v1/boletos', ['json' => $data]);
      return json_decode($response->getBody()->getContents(), true);
    } catch (RequestException $e) {
      return $this->handleRequestException($e);
    }
  }

  public function getBoletoById(int $id): array
  {
    try {
      $response = $this->client->get("/v1/boletos/{$id}");
      return json_decode($response->getBody()->getContents(), true);
    } catch (RequestException $e) {
      return $this->handleRequestException($e);
    }
  }


  public function getAllBoletos(): array
  {
    try {
      $response = $this->client->get("/v1/boletos");
      return json_decode($response->getBody()->getContents(), true);
    } catch (RequestException $e) {
      return $this->handleRequestException($e);
    }
  }
}
