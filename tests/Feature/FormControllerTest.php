<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormControllerTest extends TestCase
{
    public function testLoginSuccess()
    {
        $response = $this->post('/login', [
            "username" => "tian",
            "password" => "rahasia"
        ]);
        $response->assertStatus(200);
    }

    public function testLoginFailed()
    {
        $response = $this->post('/login', [
            "username" => "",
            "password" => ""
        ]);
        $response->assertStatus(400);
    }

    public function testFormSuccess()
    {
        $response = $this->get('/form', [
            'usename' => 'Christian',
            'password' => 'rahasia'
        ]);
        $response->assertStatus(200);
    }

    public function testFormFailed()
    {
        $response = $this->post('/form', [
            "username" => "",
            "password" => ""
        ]);
        $response->assertStatus(302);
    }
}
