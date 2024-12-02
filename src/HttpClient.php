<?php

namespace SdkIntopays;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class HttpClient
{
  protected string $baseUrl;
  protected string $jwtToken;
  protected Client $client;

  public function __construct(string $baseUrl, string $jwtToken)
  {
    $this->baseUrl = $baseUrl;
    $this->jwtToken = trim($jwtToken);
    $this->client = new Client([
      'base_uri' => $this->baseUrl,
      'headers' => [
        'Authorization' => "Bearer {$this->jwtToken}",
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
      ]
    ]);

  
  }

  protected function handleRequestException(RequestException $e): array
  {
    return ['error' => $e->getMessage()];
  }
}
