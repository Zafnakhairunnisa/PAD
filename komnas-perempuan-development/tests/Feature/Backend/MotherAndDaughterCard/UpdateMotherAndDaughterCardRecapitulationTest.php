<?php

namespace Tests\Feature\Backend\MotherAndDaughterCardRecapitulation;

use App\Domains\Cluster3\Models\MotherAndDaughterCard\MotherAndDaughterCardRecapitulation;
use App\Http\Livewire\Backend\Cluster3\MotherAndDaughterCard\Recapitulation\MotherAndDaughterCardRecapitulationUpdateForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

/**
 * Class UpdateMotherAndDaughterCardRecapitulationTest.
 */
class UpdateMotherAndDaughterCardRecapitulationTest extends TestCase
{
    use RefreshDatabase;

    private $page = '/admin/klaster-3/kartu-ibu-dan-anak/rekapitulasi';

    /** @test */
    public function the_year_is_required()
    {
        $this->loginAsAdmin();

        $recapitulation = MotherAndDaughterCardRecapitulation::factory()->create();
        Livewire::test(MotherAndDaughterCardRecapitulationUpdateForm::class, [
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

        $recapitulation = MotherAndDaughterCardRecapitulation::factory()->create();
        Livewire::test(MotherAndDaughterCardRecapitulationUpdateForm::class, [
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

        $recapitulation = MotherAndDaughterCardRecapitulation::factory()->create();
        Livewire::test(MotherAndDaughterCardRecapitulationUpdateForm::class, [
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

        $recapitulation = MotherAndDaughterCardRecapitulation::factory()->create();

        Livewire::test(MotherAndDaughterCardRecapitulationUpdateForm::class, [
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

        $this->assertTrue(MotherAndDaughterCardRecapitulation::whereValue('5000')->exists());
    }

    /** @test  */
    public function is_redirected_to_list_page_after_updated()
    {
        $this->loginAsAdmin();

        $recapitulation = MotherAndDaughterCardRecapitulation::factory()->create();

        Livewire::test(MotherAndDaughterCardRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('year', '2022')
            ->assertHasNoErrors([
                'year' => 'required',
            ])
            ->call('submit')
            ->assertRedirect($this->page);
    }
}
