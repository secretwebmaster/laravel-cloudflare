<?php

namespace App\Services\Cloudflare\Models;

class ZoneSettings extends AbstractModel
{

    public function list($zone_identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/settings";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    public function update($zone_identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/settings";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

}
