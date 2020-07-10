<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class ManagePagesTest extends TestCase
{

    use RefreshDatabase;

    private $user;

    public function setUp(): void {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    /**
     * @test
     */
    public function user_can_create_a_page_if_form_is_valid()
    {
        $valid_page_data = [
            'name' => 'Page 1',
            'url' => 'page1',
            'is_enabled' => true,
            'is_locked' => false,
            'user_id' => $this->user->id
        ];

        $response = $this->post('/pages', $valid_page_data);

        $response
            ->assertOk()
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('pages', $valid_page_data);

    }

    /**
     * @test
     */
    public function user_cannot_create_a_page_if_form_is_invalid()
    {
        $invalid_page_data = [
            'url' => 'page1',
            'is_enabled' => true,
            'is_locked' => false,
            'user_id' => $this->user->id
        ];

        $response = $this->post('/pages', $invalid_page_data);

        $response
            ->assertSessionHasErrors();

        $this->assertDatabaseMissing('pages', $invalid_page_data);
    }
}
