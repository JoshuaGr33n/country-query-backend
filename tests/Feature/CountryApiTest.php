<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryApiTest extends TestCase
{
    /** @test */
    public function it_returns_country_details_for_valid_iso_code()
    {
        $response = $this->postJson('/api/country', ['code' => 'GBR']);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'name',
                'region',
                'capitalCity',
                'longitude',
                'latitude',
            ]);
    }

    /** @test */
    public function it_returns_error_for_invalid_iso_code()
    {
        $response = $this->postJson('/api/country', ['code' => 'XXX']);

        $response->assertStatus(404) // Expecting 404 for not found
            ->assertJson([
                'error' => 'Country not found. Please check the ISO code.'
            ]);
    }


    /** @test */
    public function it_validates_iso_code_length()
    {
        // Testing for a code that is too short
        $response = $this->postJson('/api/country', ['code' => 'G']);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('code');

        // Testing for a code that is too long
        $response = $this->postJson('/api/country', ['code' => 'GBRR']);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('code');
    }

    /** @test */
    public function it_validates_iso_code_format()
    {
        // Testing with a numeric code
        $response = $this->postJson('/api/country', ['code' => '123']);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('code');
    }
}
