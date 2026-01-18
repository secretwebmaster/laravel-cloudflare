<?php

namespace Secretwebmaster\LaravelCloudflare;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use RuntimeException;

/**
 * Cloudflare API Client
 * 
 * A modern Laravel HTTP client wrapper for the Cloudflare API.
 * Handles authentication, request formatting, and response handling.
 * 
 * @package Secretwebmaster\LaravelCloudflare
 */
class Client
{
    /**
     * Cloudflare API base URL
     *
     * @var string
     */
    protected string $baseUrl = 'https://api.cloudflare.com/client/v4';

    /**
     * Request headers
     *
     * @var array<string, string>
     */
    protected array $headers = [];

    /**
     * Request timeout in seconds
     *
     * @var int
     */
    protected int $timeout = 3600;

    /**
     * User email for authentication
     *
     * @var string|null
     */
    protected ?string $email = null;

    /**
     * API token for authentication
     *
     * @var string|null
     */
    protected ?string $apiToken = null;

    /**
     * Create a new Cloudflare API Client instance
     *
     * @param string|null $email User email address
     * @param string|null $apiToken Cloudflare API token
     */
    public function __construct(?string $email = null, ?string $apiToken = null)
    {
        $this->email = $email;
        $this->apiToken = $apiToken;
        
        $this->initializeHeaders();
    }

    /**
     * Initialize default headers
     *
     * @return void
     */
    protected function initializeHeaders(): void
    {
        $this->headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$this->apiToken}",
            'X-Auth-Email' => $this->email,
        ];
    }

    /**
     * Set a single header
     *
     * @param string $key Header name
     * @param string $value Header value
     * @return self
     */
    public function setHeader(string $key, string $value): self
    {
        $this->headers[$key] = $value;
        return $this;
    }

    /**
     * Delete a single header
     *
     * @param string $key Header name to delete
     * @param mixed $value Unused parameter (kept for backward compatibility)
     * @return self
     */
    public function deleteHeader(string $key, $value = null): self
    {
        unset($this->headers[$key]);
        return $this;
    }

    /**
     * Delete multiple headers
     *
     * @param array<string> $keys Array of header names to delete
     * @return self
     */
    public function deleteHeaders(array $keys): self
    {
        foreach ($keys as $key) {
            unset($this->headers[$key]);
        }
        return $this;
    }

    /**
     * Delete all headers
     *
     * @return self
     */
    public function deleteAllHeaders(): self
    {
        $this->headers = [];
        return $this;
    }

    /**
     * Set multiple headers at once
     *
     * @param array<string, string> $array Associative array of headers
     * @return self
     */
    public function setHeaders(array $array): self
    {
        $this->headers = array_merge($this->headers, $array);
        return $this;
    }

    /**
     * Set request timeout
     *
     * @param int $seconds Timeout in seconds
     * @return self
     */
    public function setTimeout(int $seconds): self
    {
        $this->timeout = $seconds;
        return $this;
    }

    /**
     * Fetch data from Cloudflare API
     *
     * @param string $endpoint API endpoint (e.g., '/zones')
     * @param array<string, mixed> $data Request data
     * @param string $method HTTP method (GET, POST, PATCH, PUT, DELETE)
     * @return object|null JSON decoded response or null on failure
     * @throws RuntimeException When invalid HTTP method is provided
     */
    public function fetch(string $endpoint, array $data = [], string $method = 'POST'): ?object
    {
        // Filter out empty values
        $data = array_filter($data, fn($value) => $value !== null && $value !== '');
        
        $url = $this->baseUrl . $endpoint;
        $method = strtoupper($method);

        try {
            $response = $this->makeRequest($url, $data, $method);
            return json_decode($response->body());
        } catch (\Exception $e) {
            // Log the error if needed
            // You can use Laravel's logger here if needed
            return $this->createErrorResponse($e);
        }
    }

    /**
     * Make HTTP request to Cloudflare API
     *
     * @param string $url Full URL to request
     * @param array<string, mixed> $data Request data
     * @param string $method HTTP method
     * @return Response
     * @throws RuntimeException When invalid HTTP method is provided
     */
    protected function makeRequest(string $url, array $data, string $method): Response
    {
        $http = Http::timeout($this->timeout)->withHeaders($this->headers);

        return match ($method) {
            'GET' => $http->get($url, $data),
            'POST' => $http->post($url, $data),
            'PATCH' => $http->patch($url, $data),
            'PUT' => $http->put($url, $data),
            'DELETE' => $http->delete($url, $data),
            default => throw new RuntimeException("HTTP method '{$method}' is not supported"),
        };
    }

    /**
     * Create error response object
     *
     * @param \Exception $e Exception instance
     * @return object
     */
    protected function createErrorResponse(\Exception $e): object
    {
        return (object) [
            'success' => false,
            'errors' => [
                [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ]
            ],
            'messages' => [],
            'result' => null,
        ];
    }

    /**
     * Magic method to dynamically access model classes
     *
     * @param string $model Model name (e.g., 'zones', 'dns')
     * @param array<mixed> $args Arguments passed to the model
     * @return object Model instance
     * @throws RuntimeException When model class doesn't exist
     */
    public function __call(string $model, array $args): object
    {
        $className = 'Secretwebmaster\\LaravelCloudflare\\Models\\' 
            . ucfirst(str($model)->camel());

        if (!class_exists($className)) {
            throw new RuntimeException(
                "Model '{$model}' does not exist. Expected class: {$className}"
            );
        }

        return new $className($this, $args);
    }
}