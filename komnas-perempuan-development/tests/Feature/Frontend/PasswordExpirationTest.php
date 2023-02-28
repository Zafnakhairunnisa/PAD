<?php

namespace Tests\Feature\Frontend;

use App\Domains\Auth\Models\User;
use Tests\TestCase;

/**
 * Class PasswordExpirationTest.
 */
class PasswordExpirationTest extends TestCase
{
    /** @test */
    public function a_user_can_access_the_password_expired()
    {
        config(['boilerplate.access.user.password_expires_days' => 30]);

        $user = User::factory()->create();

        $this->actingAs($user);

        $this->get('/password/expired')->assertOk();
    }

    /** @test */
    public function password_expiration_update_requires_validation()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->patch('/password/expired');

        $response->assertSessionHasErrors(['current_password', 'password']);
    }
}
