<?php

namespace App\Services\Cloudflare\Models;

class Accounts extends AbstractModel
{
    public function list($data = [])
    {
        $endpoint = "/accounts";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }
    
    public function details($identifier, $data = [])
    {
        $endpoint = "/accounts/{$identifier}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    
}
