<?php

namespace Tests\Feature\Backend\MaternalDeathRecapitulation;

use App\Domains\Cluster3\Models\MaternalDeath\MaternalDeathRecapitulation;
use App\Http\Livewire\Backend\Cluster3\MaternalDeath\Recapitulation\MaternalDeathRecapitulationUpdateForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

/**
 * Class UpdateMaternalDeathRecapitulationTest.
 */
class UpdateMaternalDeathRecapitulationTest extends TestCase
{
    use RefreshDatabase;

    private $page = '/admin/klaster-3/angka-kematian-ibu/rekapitulasi';

    /** @test */
    public function the_year_is_required()
    {
        $this->loginAsAdmin();

        $recapitulation = MaternalDeathRecapitulation::factory()->create();
        Livewire::test(MaternalDeathRecapitulationUpdateForm::class, [
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

        $recapitulation = MaternalDeathRecapitulation::factory()->create();
        Livewire::test(MaternalDeathRecapitulationUpdateForm::class, [
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

        $recapitulation = MaternalDeathRecapitulation::factory()->create();
        Livewire::test(MaternalDeathRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('location_id', '')
            ->call('submit')
            ->assertHasErrors([
                'location_id' => 'required',
            ]);
    }

    /** @test */
    public function an_maternal_death_value_can_be_updated()
    {
        $this->loginAsAdmin();

        $recapitulation = MaternalDeathRecapitulation::factory()->create();

        Livewire::test(MaternalDeathRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('value', '5000')
            ->call('submit')
            ->assertHasNoErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);

        $this->assertTrue(MaternalDeathRecapitulation::whereValue('5000')->exists());
    }

    /** @test */
    public function an_maternal_death_year_can_be_updated()
    {
        $this->loginAsAdmin();

        $recapitulation = MaternalDeathRecapitulation::factory()->create();

        Livewire::test(MaternalDeathRecapitulationUpdateForm::class, [
            'recapitulation' => $recapitulation,
        ])
            ->set('year', '2022')
            ->call('submit')
            ->assertHasNoErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);

        $this->assertTrue(MaternalDeathRecapitulation::where('year', '=', '2022')->exists());
    }

    /** @test  */
    public function is_redirected_to_list_page_after_updated()
    {
        $this->loginAsAdmin();

        $recapitulation = MaternalDeathRecapitulation::factory()->create();

        Livewire::test(MaternalDeathRecapitulationUpdateForm::class, [
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
