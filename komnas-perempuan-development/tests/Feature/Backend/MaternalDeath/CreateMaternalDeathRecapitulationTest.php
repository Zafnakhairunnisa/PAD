<?php

namespace Tests\Feature\Backend\MaternalDeathRecapitulation;

use App\Domains\Cluster3\Models\MaternalDeath\MaternalDeathRecapitulation;
use App\Http\Livewire\Backend\Cluster3\MaternalDeath\Recapitulation\MaternalDeathRecapitulationCreateForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

/**
 * Class CreateMaternalDeathRecapitulationTest.
 */
class CreateMaternalDeathRecapitulationTest extends TestCase
{
    use RefreshDatabase;

    private $page = '/admin/klaster-3/angka-kematian-ibu/rekapitulasi';

    /** @test */
    public function an_admin_can_access_the_create_maternal_death_page()
    {
        $this->loginAsAdmin();

        $this->get($this->page.'/create')->assertOk();
    }

    /** @test */
    public function create_maternal_death_requires_validation()
    {
        $this->loginAsAdmin();

        Livewire::test(MaternalDeathRecapitulationCreateForm::class)
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
    public function create_maternal_death_location_should_only_from_selection()
    {
        $this->loginAsAdmin();

        Livewire::test(MaternalDeathRecapitulationCreateForm::class)
            ->set('location_id', '10')
            ->call('submit')
            ->assertHasErrors([
                'location_id' => 'exists',
            ]);
    }

    /** @test */
    public function a_maternal_death_can_be_created()
    {
        $this->loginAsAdmin();

        Livewire::test(MaternalDeathRecapitulationCreateForm::class)
            ->set('year', '2022')
            ->set('value', '10')
            ->set('location_id', '1')
            ->call('submit')
            ->assertHasNoErrors([
                'year' => 'required',
                'value' => 'required',
                'location_id' => 'required',
            ]);

        $this->assertTrue(MaternalDeathRecapitulation::whereLocationId('1')->exists());
    }

    /** @test  */
    public function is_redirected_to_list_page_after_creation()
    {
        $this->loginAsAdmin();

        Livewire::test(MaternalDeathRecapitulationCreateForm::class)
            ->set('year', '2022')
            ->set('value', '10')
            ->set('location_id', '1')
            ->call('submit')
            ->assertRedirect($this->page);
    }
}
