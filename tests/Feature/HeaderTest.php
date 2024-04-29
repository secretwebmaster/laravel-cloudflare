<?php

use Orchestra\Testbench\TestCase;
use Secretwebmaster\LaravelCloudflare\Client;

class HeaderTest extends TestCase
{

    /** @test */
    public function set_header_test($key, $value)
    {
        $this->headers[$key] = $value;
        $this->assertTrue(false);
    }

    /** @test */
    public function delete_header_test($key, $value)
    {
        if(!empty($this->headers[$key])){
            unset($this->headers[$key]);
        }
        $this->assertTrue(false);
    }

    /** @test */
    public function delete_headers_test($keys)
    {
        foreach($keys as $key){
            if(!empty($this->headers[$key])){
                unset($this->headers[$key]);
            }
        }
        $this->assertTrue(false);
    }

    /** @test */
    public function delete_all_headers_test()
    {
        $this->headers = [];
        $this->assertTrue(false);
    }

    /** @test */
    public function set_headers_test($array)
    {
        foreach($array as $key => $value){
            $this->headers[$key] = $value;
        }
        $this->assertTrue(false);
    }
}