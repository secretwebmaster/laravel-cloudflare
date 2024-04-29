<?php

namespace App\Services\Cloudflare\Models;

Use App\Services\Cloudflare\Client;

abstract class AbstractModel
{
    protected $client;

    public function __construct(Client $client, $data)
    {
        $this->client = $client;
    }
}