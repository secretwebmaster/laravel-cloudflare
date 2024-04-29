<?php

namespace App\Services\Cloudflare\Models;

class Zones extends AbstractModel
{
    public function list($data = [])
    {
        $endpoint = "/zones";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    public function create($data = [])
    {
        $endpoint = "/zones";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // public function delete($data = [])
    // {
    //     $endpoint = "/zones";
    //     $method = 'GET';
    //     return $this->client->fetch($endpoint, $data, $method);
    // }

    // public function edit($identifier, $data = [])
    // {
        
    //     $endpoint = "/zones/{$identifier}";
    //     $method = 'PATCH';
    //     return $this->client->fetch($endpoint, $data, $method);
    // }

    // public function purge($data = [])
    // {
    //     $endpoint = "/zones";
    //     $method = 'GET';
    //     return $this->client->fetch($endpoint, $data, $method);
    // }


    public function getByDomain(string $domain)
    {
        $zoneList = $this->list([
            'name' => $domain
        ]);

        try{
            
            return $zoneList->result[0] ?? null;

        }catch(\Exception $e){

            return ;
            
        }

        return;
    }



}
