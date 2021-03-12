<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    public function testConvertArabicToRomanApi() {
        $response = $this->post('/api/convertArabicToRoman', ['arabic_number' => 100], ['Authorization' => 'Bearer mBu7IB6nuxh8RVzJ61f4']);

        $response->assertStatus(200)->assertJson(['success' => true]);
    }

    public function testGetRecentlyConversions() {
        $response = $this->get('/api/getRecentlyConversions', ['Authorization' => 'Bearer mBu7IB6nuxh8RVzJ61f4']);

        $response->assertStatus(200)->assertJson(['success' => true]);
    }

    public function testGetTop10Conversions() {
        $response = $this->get('/api/getTop10Conversions', ['Authorization' => 'Bearer mBu7IB6nuxh8RVzJ61f4']);

        $response->assertStatus(200)->assertJson(['success' => true]);
    }
}
