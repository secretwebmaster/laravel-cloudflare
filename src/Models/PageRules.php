<?php

namespace App\Services\Cloudflare\Models;

class PageRules extends AbstractModel
{

    /**
     * @link https://developers.cloudflare.com/api/operations/page-rules-list-page-rules
     */
    public function list($zone_identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/pagerules";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * @link https://developers.cloudflare.com/api/operations/page-rules-create-a-page-rule
     */
    public function create($zone_identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/pagerules";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * @link https://developers.cloudflare.com/api/operations/page-rules-delete-a-page-rule
     */
    public function delete($zone_identifier, $identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/pagerules/{$identifier}";
        $method = 'DELETE';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * @link https://developers.cloudflare.com/api/operations/page-rules-get-a-page-rule
     */
    public function get($zone_identifier, $identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/pagerules/{$identifier}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * @link https://developers.cloudflare.com/api/operations/page-rules-edit-a-page-rule
     */
    public function edit($zone_identifier, $identifier,  $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/pagerules/{$identifier}";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * @link https://developers.cloudflare.com/api/operations/page-rules-update-a-page-rule
     */
    public function update($zone_identifier, $identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/pagerules/{$identifier}";
        $method = 'PUT';
        return $this->client->fetch($endpoint, $data, $method);
    }


    /**
     * ! Custom Function
     */
    public function getSettingList($zone_identifier, $data = [])
    {
        $endpoint = "/zones/{$zone_identifier}/pagerules/settings";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }
}
