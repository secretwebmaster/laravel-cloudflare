<?php

namespace App\Services\Cloudflare\Models;

class DnsRecords extends AbstractModel
{
    public function list($zone_identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/dns_records";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    public function create($zone_identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/dns_records";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    public function export($zone_identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/dns_records/export";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    public function import($zone_identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/dns_records/import";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    public function scan($zone_identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/dns_records/scan";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // public function delete($zone_identifier, $identifier, $data = [])
    // {
    //     $endpoint = "/zones/{$zone_identifier}/dns_records/{$identifier}";
    //     $method = 'DELETE';
    //     return $this->client->fetch($endpoint, $data, $method);
    // }

    // public function details($zone_identifier, $identifier, $data = [])
    // {
    //     $endpoint = "/zones/{$zone_identifier}/dns_records";
    //     $method = 'POST';
    //     return $this->client->fetch($endpoint, $data, $method);
    // }

    // public function patch($zone_identifier, $identifier, $data = [])
    // {
    //     $endpoint = "/zones/{$zone_identifier}/dns_records";
    //     $method = 'PATCH';
    //     return $this->client->fetch($endpoint, $data, $method);
    // }

    public function update($zone_identifier, $identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/dns_records/{$identifier}";
        $method = 'PUT';
        return $this->client->fetch($endpoint, $data, $method);
    }

}
