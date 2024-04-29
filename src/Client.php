<?php

namespace Secretwebmaster\LaravelCloudflare;


use Illuminate\Support\Facades\Http;

class Client{

    public $base_url = "https://api.cloudflare.com/client/v4";
    public $headers;
    public $headers_backup;
    public $timeout = 3600;


    public function __construct($email = null, $api_token = null)
    {
        $this->email = $email ?? gss('cloudflare_email');
        $this->api_token = $api_token ?? gss('cloudflare_api_token');
        $this->headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$this->api_token}",
            'X-Auth-Email' => $this->email,
        ];
    }

    //handle headers
    public function set_header($key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }

    public function delete_header($key, $value)
    {
        if(!empty($this->headers[$key])){
            unset($this->headers[$key]);
        }
        return $this;
    }
    
    public function delete_headers($keys)
    {
        foreach($keys as $key){
            if(!empty($this->headers[$key])){
                unset($this->headers[$key]);
            }
        }
        return $this;
    }

    public function delete_all_headers()
    {
        $this->headers = [];
        return $this;
    }
    
    public function set_headers($array)
    {
        foreach($array as $key => $value){
            $this->headers[$key] = $value;
        }
        return $this;
    }
    
    //! Common function that not runing alone
    public function fetch($endpoint, $data, $method = 'post')
    {
        $data = array_filter($data);
        try {
            $url  = $this->base_url . $endpoint;

            if(strtolower($method) == 'get'){
                $response = Http::timeout($this->timeout)->withHeaders($this->headers)->get($url, $data);
            }elseif(strtolower($method) == 'post'){
                $response = Http::timeout($this->timeout)->withHeaders($this->headers)->post($url, $data);
            }elseif(strtolower($method) == 'patch'){
                $response = Http::timeout($this->timeout)->withHeaders($this->headers)->patch($url, $data);
            }elseif(strtolower($method) == 'put'){
                $response = Http::timeout($this->timeout)->withHeaders($this->headers)->put($url, $data);
            }elseif(strtolower($method) == 'delete'){
                $response = Http::timeout($this->timeout)->withHeaders($this->headers)->delete($url, $data);
            }else{
                dd("method " . $method . " does not exist");
            }

            return json_decode($response->body());

        } catch (BadResponseException $e) {

            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
                'verification_status' => 'FAILED',
            ]);

        }
    }

    public function __call($model, array $args)
    {
        $class = 'Secretwebmaster\LaravelCloudflare\Models\\' . ucfirst(str($model)->camel());
        if (class_exists($class)) {
            return new $class($this, $args);
        }
        throw new \RuntimeException('Secretwebmaster\LaravelCloudflare\Models "' . $model . '" does not exist"');
    }


    // public function debug_message($e)
    // {
    //     info($e->getMessage() . " " . $e->getCode() . " " .  $e->getFile() .  " " . $e->getLine());
    //     wncms_add_record("payment", 'validate_signiture', 'fail', $e->getMessage(), $e->__toString());
    //     //TODO: redirect user to payment page
    //     // return back()->with('error', $e->getResponse()->getBody()->getContents());
    // }


}