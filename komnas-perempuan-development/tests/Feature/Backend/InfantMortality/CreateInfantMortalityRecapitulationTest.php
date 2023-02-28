<?php

namespace Tests\Feature\Backend\InfantMortalityRecapitulation;

use App\Domains\Cluster3\Models\InfantMortality\InfantMortalityRecapitulation;
use App\Http\Livewire\Backend\Cluster3\InfantMortality\Recapitulation\InfantMortalityRecapitulationCreateForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

/**
 * Class CreateInfantMortalityRecapitulationTest.
 */
class CreateInfantMortalityRecapitulationTest extends TestCase
{
    use RefreshDatabase;

    private $page = '/admin/klaster-3/angka-kematian-bayi/rekapitulasi';

    /** @test */
    public function an_admin_can_access_the_create_infant_mortality_page()
    {
        $this->loginAsAdmin();

        $this->get($this->page.'/create')->assertOk();
    }

    /** @test */
    public function create_infant_mortality_requires_validation()
    {
        $this->loginAsAdmin();

        Livewire::test(InfantMortalityRecapitulationCreateForm::class)
            ->set('value', '')
            ->set('year', '')
            ->set('location_id', '')
            ->call('submit')
            ->assertHasErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);
    }

    /** @test */
    public function create_infant_mortality_location_should_only_from_selection()
    {
        $this->loginAsAdmin();

        Livewire::test(InfantMortalityRecapitulationCreateForm::class)
            ->set('location_id', '10')
            ->call('submit')
            ->assertHasErrors([
                'location_id' => 'exists',
            ]);
    }

    /** @test */
    public function a_infant_mortality_can_be_created()
    {
        $this->loginAsAdmin();

        Livewire::test(InfantMortalityRecapitulationCreateForm::class)
            ->set('year', '2022')
            ->set('value', '10')
            ->set('location_id', '1')
            ->call('submit')
            ->assertHasNoErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);

        $this->assertTrue(InfantMortalityRecapitulation::whereLocationId('1')->exists());
    }

    /** @test  */
    public function is_redirected_to_list_page_after_creation()
    {
        $this->loginAsAdmin();

        Livewire::test(InfantMortalityRecapitulationCreateForm::class)
            ->set('year', '2022')
            ->set('value', '10')
            ->set('location_id', '1')
            ->call('submit')
            ->assertRedirect($this->page);
    }
}
