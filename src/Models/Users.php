<?php

namespace App\Services\Cloudflare\Models;

class Users extends AbstractModel
{
    public function details($data = [])
    {
        $endpoint = "/user";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

}
