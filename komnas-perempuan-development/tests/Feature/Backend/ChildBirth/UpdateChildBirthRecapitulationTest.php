<?php

namespace Tests\Feature\Backend\ChildBirthRecapitulation;

use App\Domains\Cluster3\Models\ChildBirth\ChildBirthRecapitulation;
use App\Http\Livewire\Backend\Cluster3\ChildBirth\Recapitulation\ChildBirthRecapitulationUpdateForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

/**
 * Class UpdateChildBirthRecapitulationTest.
 */
class UpdateChildBirthRecapitulationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_year_is_required()
    {
        $this->loginAsAdmin();

        $recapitulation = ChildBirthRecapitulation::factory()->create();
        Livewire::test(ChildBirthRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('year', '')
            ->call('submit')
            ->assertHasErrors([
                'year' => 'required',
            ]);
    }

    /** @test */
    public function the_value_is_required()
    {
        $this->loginAsAdmin();

        $recapitulation = ChildBirthRecapitulation::factory()->create();
        Livewire::test(ChildBirthRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('value', '')
            ->call('submit')
            ->assertHasErrors([
                'value' => 'required',
            ]);
    }

    /** @test */
    public function the_location_is_required()
    {
        $this->loginAsAdmin();

        $recapitulation = ChildBirthRecapitulation::factory()->create();
        Livewire::test(ChildBirthRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('location_id', '')
            ->call('submit')
            ->assertHasErrors([
                'location_id' => 'required',
            ]);
    }

    /** @test */
    public function a_child_birth_value_can_be_updated()
    {
        $this->loginAsAdmin();

        $recapitulation = ChildBirthRecapitulation::factory()->create();

        Livewire::test(ChildBirthRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->assertSet('year', $recapitulation->year)
            ->assertSet('value', $recapitulation->value)
            ->assertSet('location_id', $recapitulation->location_id)
            ->set('value', '5000')
            ->call('submit')
            ->assertHasNoErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);

        $this->assertTrue(ChildBirthRecapitulation::whereValue('5000')->exists());
    }
}
