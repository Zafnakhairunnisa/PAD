<?php

namespace Tests\Feature\Frontend;

use App\Domains\Auth\Models\User;
use Tests\TestCase;

/**
 * Class UserAccountTest.
 */
class UserAccountTest extends TestCase
{
    /** @test */
    public function profile_update_requires_validation()
    {
        $this->actingAs(User::factory()->create());

        config(['boilerplate.access.user.change_email' => true]);

        $response = $this->patch('/profile/update');

        $response->assertSessionHasErrors(['name', 'email']);

        config(['boilerplate.access.user.change_email' => false]);

        $response = $this->patch('/profile/update');

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_user_can_update_their_profile()
    {
        config(['boilerplate.access.user.change_email' => false]);

        $user = User::factory()->create([
            'name' => 'Jane Doe',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Jane Doe',
        ]);

        $response = $this->actingAs($user)
            ->patch('/profile/update', [
                'name' => 'John Doe',
            ])->assertRedirect('/account?#information');

        $response->assertSessionHas('flash_success', __('Profile successfully updated.'));

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'John Doe',
        ]);
    }
}
