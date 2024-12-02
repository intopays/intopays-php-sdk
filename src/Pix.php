<?php
namespace SdkIntopays;

use GuzzleHttp\Exception\RequestException;
use SdkIntopays\HttpClient;

class Pix extends HttpClient
{

  public function getPixTransactions(array $queryParams = []): array
  {
    try {
      $response = $this->client->get('/v1/pixs', ['query' => $queryParams]);
      return json_decode($response->getBody()->getContents(), true);
    } catch (RequestException $e) {
      return $this->handleRequestException($e);
    }
  }

  public function createPixTransaction(array $data): array
  {
    try {
      $response = $this->client->post('/v1/pixs', [
        'json' => $data
      ]);
      return json_decode($response->getBody()->getContents(), true);
    } catch (RequestException $e) {
      return $this->handleRequestException($e);
    }
  }

  public function getPixById(int $id): array
  {
    try {
      $response = $this->client->get("/v1/pixs/{$id}");
      return json_decode($response->getBody()->getContents(), true);
    } catch (RequestException $e) {
      return $this->handleRequestException($e);
    }
  }

}
