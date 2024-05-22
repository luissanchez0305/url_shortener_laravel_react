<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Url;

class UrlTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_url()
    {
        $url = Url::create([
            'original_url' => 'https://example.com',
            'shortened_url' => 'abcd1234'
        ]);

        $this->assertDatabaseHas('urls', [
            'original_url' => 'https://example.com',
            'shortened_url' => 'abcd1234'
        ]);
    }
}
