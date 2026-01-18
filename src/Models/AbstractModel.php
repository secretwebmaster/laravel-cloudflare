<?php

namespace Secretwebmaster\LaravelCloudflare\Models;

use Secretwebmaster\LaravelCloudflare\Client;

/**
 * Abstract Model Base Class
 * 
 * Base class for all Cloudflare API model classes.
 * Provides common functionality and structure for API interactions.
 * 
 * @package Secretwebmaster\LaravelCloudflare\Models
 */
abstract class AbstractModel
{
    /**
     * Cloudflare API Client instance
     *
     * @var Client
     */
    protected Client $client;

    /**
     * Additional data passed to the model
     *
     * @var array<mixed>
     */
    protected array $data;

    /**
     * Create a new Model instance
     *
     * @param Client $client Cloudflare API client
     * @param array<mixed> $data Additional data
     */
    public function __construct(Client $client, array $data = [])
    {
        $this->client = $client;
        $this->data = $data;
    }

    /**
     * Get the client instance
     *
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Get the model data
     *
     * @return array<mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }
}