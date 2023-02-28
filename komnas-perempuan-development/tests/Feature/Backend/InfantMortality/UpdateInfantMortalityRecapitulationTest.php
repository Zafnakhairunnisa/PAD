<?php

namespace Tests\Feature\Backend\InfantMortalityRecapitulation;

use App\Domains\Cluster3\Models\InfantMortality\InfantMortalityRecapitulation;
use App\Http\Livewire\Backend\Cluster3\InfantMortality\Recapitulation\InfantMortalityRecapitulationUpdateForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

/**
 * Class UpdateInfantMortalityRecapitulationTest.
 */
class UpdateInfantMortalityRecapitulationTest extends TestCase
{
    use RefreshDatabase;

    private $page = '/admin/klaster-3/angka-kematian-bayi/rekapitulasi';

    /** @test */
    public function the_year_is_required()
    {
        $this->loginAsAdmin();

        $recapitulation = InfantMortalityRecapitulation::factory()->create();
        Livewire::test(InfantMortalityRecapitulationUpdateForm::class, [
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

        $recapitulation = InfantMortalityRecapitulation::factory()->create();
        Livewire::test(InfantMortalityRecapitulationUpdateForm::class, [
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

        $recapitulation = InfantMortalityRecapitulation::factory()->create();
        Livewire::test(InfantMortalityRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('location_id', '')
            ->call('submit')
            ->assertHasErrors([
                'location_id' => 'required',
            ]);
    }

    /** @test */
    public function an_infant_mortality_value_can_be_updated()
    {
        $this->loginAsAdmin();

        $recapitulation = InfantMortalityRecapitulation::factory()->create();

        Livewire::test(InfantMortalityRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('value', '5000')
            ->call('submit')
            ->assertHasNoErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);

        $this->assertTrue(InfantMortalityRecapitulation::whereValue('5000')->exists());
    }

    /** @test */
    public function an_infant_mortality_year_can_be_updated()
    {
        $this->loginAsAdmin();

        $recapitulation = InfantMortalityRecapitulation::factory()->create();

        Livewire::test(InfantMortalityRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('year', '2022')
            ->call('submit')
            ->assertHasNoErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);

        $this->assertTrue(InfantMortalityRecapitulation::where('year', '=', '2022')->exists());
    }

    /** @test  */
    public function is_redirected_to_list_page_after_updated()
    {
        $this->loginAsAdmin();

        $recapitulation = InfantMortalityRecapitulation::factory()->create();

        Livewire::test(InfantMortalityRecapitulationUpdateForm::class, [
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
