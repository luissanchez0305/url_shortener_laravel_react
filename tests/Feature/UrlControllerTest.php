<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Url;

class UrlControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shorten_a_url()
    {
        $response = $this->postJson('/api/shorten', [
            'original_url' => 'https://example.com'
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['id', 'original_url', 'shortened_url', 'created_at', 'updated_at']);

        $this->assertDatabaseHas('urls', [
            'original_url' => 'https://example.com',
        ]);
    }

    /** @test */
    public function it_redirects_to_original_url()
    {
        $url = Url::factory()->create([
            'original_url' => 'https://example.com',
            'shortened_url' => 'abcd1234'
        ]);

        $response = $this->get('/api/abcd1234');

        $response->assertStatus(200);
    }
}
